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
        this.lib('#fg-filemanager-project').on('click', this.functions.filemanagerGallery.bind(this));
        this.lib('#fg-filemanager-cover').on('click', this.functions.filemanagerCover.bind(this));
        UIkit.util.on('#projects-sort', 'stop', this.functions.gallerySort.bind(this));
        this.lib('body').on('click', this.functions.imageTrash.bind(this), '.fj-project-image-trash');
    }


    functions = {
        imageTrash(e)
        {
            e.preventDefault();
            
            if (!confirm('Are you sure?')) return false;
            
            const el = e.target.closest('a');
            const index = el.getAttribute('data-index');
            const inp = document.querySelector('#gallery-hidden-input');
            const val = inp.getAttribute('value');
            let arr = val.split(',');
            arr.splice(index, 1);
            inp.value = arr.join(',');
            
            el.closest('li').remove();
        },
        
        gallerySort(e)
        {
            const arr = Array.from(e.target.querySelectorAll('li')).map((li, i) => {
                li.querySelector('a.fj-project-image-trash').setAttribute('data-index', i);
                return li.getAttribute('data-img');
            });
            console.log(arr);
            document.querySelector('#gallery-hidden-input').value = arr.join(',');
        },
        
        filemanagerCover(e)
        {
            e.preventDefault();
            
            filemanager(files => {
                const cover = files[0].split('files/')[1];
                this.lib('#cover-hidden-input').val(cover);
                this.lib('#selected-cover').html('<b class=uk-text-success>Cover image is selected.</b>');
            });
        },
        
        
        filemanagerGallery(e)
        {
            e.preventDefault();
            
            const val = document.querySelector('#gallery-hidden-input').getAttribute('value');
            const arr = val.length ? val.split(',') : [];
            
            filemanager(files => {
                const filesArr = files.map(item => item.split('files/')[1]);
                
                filesArr.forEach( (item, i) => arr.push(item));
                
                const imagesStr = arr.join(',');
                this.lib('#gallery-hidden-input').val(imagesStr);
                
                
                // Creating gallery sortable cards :)
                this.functions.generateGalleryCards.call(this);
            });
        },
        
        
        
        generateGalleryCards() {
            const inp = document.querySelector('#gallery-hidden-input');
            const val = inp.getAttribute('value');
            let arr = val.split(',');
            const galleryContainer = document.querySelector('#projects-sort');
            galleryContainer.innerHTML = '';
            
            arr.forEach((imgPath, index) => {
                galleryContainer.insertAdjacentHTML('beforeend', `
                    <li data-img="${imgPath}">
                        <div class="uk-position-relative uk-border-rounded uk-card uk-card-default uk-card-body uk-text-center" data-bg="${this.variables.baseurl}/assets/tinyeditor/filemanager/files/${imgPath}">
                            <a data-index="${index}" href="#" uk-icon="icon: trash;" class="uk-icon-button fj-project-image-trash"></a>
                        </div>
                    </li>
                `)
            });
            
            document.querySelectorAll('[data-bg]').forEach(bg => {
                const image = bg.getAttribute('data-bg');
                bg.style.background = `url(${image}) no-repeat center / cover`;
            });
        },
        
        
        checkDir(e)
        {
            e.preventDefault();
            
            const index = e.target.closest('a').getAttribute('data-index');
            const items = Array.from(document.querySelectorAll('.fj-lightbox-link')).map(item => {
                return {source: item.getAttribute('href')}
            });
            
            const panel = UIkit.lightboxPanel({
                items
            });
            
            panel.show(index);
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