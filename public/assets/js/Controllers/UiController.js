import SketchEngine from '../sketchEngine/SketchEngine.js';


export default class UiController extends SketchEngine {
        
    constructor() {
        super();
        this.variables.baseurl = arguments[0].baseurl;
    }

    
    variables = {
        images: undefined
    };


    execute = [
        'bgImage',
        'color',
        'textSize',
        'bgColor',
        'styles',
        'mobileNav',
        'responsive',
        'languageParser'
    ];


    components = [];


    selectors = {
        navDropdown: '.uk-navbar-dropdown',
        mobileNav: '#fg-mobile-nav ul',
        tinyArea: '.tiny-area',
        navItem: '#fj-navigation > ul li a' // Items to translate
    };


    html = {}


    catchDOM() {}


    bindEvents() {
        UIkit.util.on('#call-request', 'shown', this.functions.renderRequestForm.bind(this));
        UIkit.util.on('#call-request', 'hidden', this.functions.clearForm.bind(this));
        this.lib('body').on('submit', this.functions.sendCallRequest.bind(this), '#call-request-form');
    }


    functions = {
        
        sendCallRequest(e)
        {
            e.preventDefault();
            
            const form = document.querySelector('#call-request-form');
            const objectData = this.lib().formData(form, false);
            const csrf = document.querySelector('meta[name="csrf_token"]').getAttribute('content');
            objectData.csrf_token = csrf;
            form.querySelectorAll('.error-text').forEach(p => p.setAttribute('hidden', true));
            
            fetch(`${this.variables.baseurl}/${document.documentElement.lang}/call-request`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                },
                body: JSON.stringify(objectData)
            })
            .then(res => res.json())
            .then(res => {
                if (res.errors) {
                    for (const key in res.errors) {
                        const err = res.errors[key].toString();
                        const p = document.querySelector(`#error-${key}`);
                        
                        p.innerText = err;
                        p.removeAttribute('hidden');
                    }
                }
                
                
                if (res.error) {
                    UIkit.notification(`<p class="uk-margin-remove uk-text-small">${res.error}</p>`, {
                        status: 'danger',
                        pos: 'top-center'
                    })
                }
            });
        },
        
        
        clearForm(e)
        {
            e.target.querySelector('#request-content').innerHTML = '';
        },
        
        renderRequestForm(e)
        {
            const body = e.target.querySelector('#request-content');
            body.innerHTML = `<div class="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>`;
            
            //spinner.setAttribute('hidden', true);
            
            fetch(`${this.variables.baseurl}/${document.documentElement.lang}/call-request`, {
                method: "get",
                headers: {
                  "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(res => res.text())
            .then(res => {
                                
                body.innerHTML = res;
            });
        },
        
        
        languageParser()
        {
            const langTag = document.documentElement.lang;
            const re = new RegExp(`\\[${langTag}\\=\\"(.*?)\\"\\]`, "gim");
            
            document.querySelectorAll(this.selectors.navItem).forEach(item => {
                const res = item.innerText.match(/{{(.*)}}/i);
                if (res) {
                    const word = res[1].match(re)[0].match(/\"(.*)\"/i)[1];
                    if (item.childElementCount > 0) {
                        Array.from(item.children).forEach(el => {
                            const cloned = el.cloneNode(true);
                            item.textContent = word;
                            item.appendChild(cloned);
                        });
                    } else {
                        item.textContent = word;
                    }
                }
            });
        },
        
        
        bgImage() {
            
            document.querySelectorAll('[data-bg]').forEach(bg => {
                
                const image = bg.getAttribute('data-bg');
                bg.style.background = `url(${image}) no-repeat center / cover`;
                
                if (bg.getAttribute('bg-size')) {
                    const bgSize = bg.getAttribute('bg-size');
                    bg.style.backgroundSize = bgSize;
                }
                
                if (bg.getAttribute('bg-position')) {
                    const bgPos = bg.getAttribute('bg-position');
                    console.log(bgPos);
                    bg.style.backgroundPosition = bgPos;
                }
            });
        },
        
        
        color() {
            document.querySelectorAll('[data-color]').forEach(cl => {
                const color = cl.getAttribute('data-color');
                cl.style.color = color;
            });
        },
        
        
        bgColor() {
            document.querySelectorAll('[data-bg-color]').forEach(bgColor => {
                const color = bgColor.getAttribute('data-bg-color');
                bgColor.style.backgroundColor = color;
            })
            
        },
        
        
        textSize() {
            document.querySelectorAll('[data-font-size]').forEach(txt => {
                const size = txt.getAttribute('data-font-size');
                txt.style.fontSize = size;
            });
        },
        
        
        styles() {
            document.querySelectorAll('[data-style]').forEach(st => {
                const style = st.getAttribute('data-style');
                st.setAttribute('style', style);
            });
        },
        
        
        mobileNav() {
                        
            const mobileNav = document.querySelector(this.selectors.mobileNav);
            if (!mobileNav) return false;
            
            mobileNav.removeAttribute('class');
            mobileNav.classList.add('uk-nav-default', 'uk-nav-parent-icon', 'uk-nav');
            mobileNav.setAttribute('uk-nav', '');
            
            const lists = mobileNav.querySelectorAll('li');
            
            lists.forEach(li => {
                if (li.querySelector('.uk-navbar-dropdown')) {
                    
                    li.classList.add('uk-parent')
                    
                    const dropdown = li.querySelector('.uk-navbar-dropdown');
                    const navHtml = dropdown.innerHTML;
                    
                    dropdown.remove();
                    
                    const dom = new DOMParser().parseFromString(navHtml, "text/html");
                    const navEl = dom.querySelector('ul');
                    
                    navEl.removeAttribute('class')
                    navEl.classList.add('uk-nav-sub');
                    li.firstElementChild.insertAdjacentElement('afterend', navEl);
                }
            });

        },
        
        
        responsive() {
            /*
            * add attributes like in the example
            * data-responsive="max-width[100]; style[color: ...; font-size: ...;]"
            */


           document.querySelectorAll('[data-responsive]').forEach(elem => {
               const str = elem.getAttribute('data-responsive');
               const match = str.match(/max-width[\s+]?\[(.*?)\]\;/g);
               const maxWidth = match[0].match(/\[(.*?)\]/)[1];
               const styles = str.match(/style[\s+]?\[(.*?)\]/)[1];

               let myFunction = x => {
                   if (x.matches) { // If media query matches
                       elem.setAttribute('style', styles);
                   } else {
                       elem.removeAttribute('style')
                   }
               }

               let x = window.matchMedia("(max-width: "+maxWidth+"px)");
               myFunction(x);
               x.addListener(myFunction);
           });
        }

    }

}