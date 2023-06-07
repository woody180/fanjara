import SketchEngine from '../sketchEngine/SketchEngine.js';


export default class ProductController extends SketchEngine {
        
    constructor() {
        super();
        this.variables.baseurl = arguments[0].baseurl;
    }
    
    
    variables = {};


    execute = [
        
    ];


    components = [];


    selectors = {
        thumbnail: '#fj-upload-thumbnail',
        removeThumb: '#fj-remove-thumb',
        thumbInput: '#thumb',
        filemanagerBtn: '#fg-filemanager',
        galleryHiddenInput: '#fg-gallery-hidden',
        sortableGalleryContainer: '#fj-sortable-gallery',
        imageTrashBtn: '.fj-gallery-image-trash'
    };


    html = {}


    catchDOM() {}


    bindEvents() {
        this.lib(this.selectors.thumbnail).on('change', this.functions.changeThumb.bind(this));
        this.lib(this.selectors.removeThumb).on('click', this.functions.removeThumb.bind(this));
        UIkit.util.on(this.selectors.sortableGalleryContainer, 'stop', this.functions.gallerySort.bind(this));
        this.lib(this.selectors.filemanagerBtn).on('click', this.functions.openFilemanager.bind(this));
        this.lib('body').on('click', this.functions.imageTrash.bind(this), this.selectors.imageTrashBtn);
        this.lib('select[name="lang"]').on('change', this.functions.switchLanguage.bind(this));
    }


    functions = {
        
        switchLanguage(e) {
            const options = e.target.options;
            const index = options.selectedIndex;
            const val = options[index].value;
            
            fetch(`${this.variables.baseurl}/${document.documentElement.lang}/language/switch/${val}`, {
                method: 'GET',
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest"
                }
            })
            .then(res => res.json())
            .then(res => {
                return location.href = res.url;
            });
        },
        
        imageTrash(e) {
            e.preventDefault();
            
            if (!confirm('Are you sure?')) return false;
            
            const el = e.target.closest('a');
            const index = el.getAttribute('data-index');
            const inp = document.querySelector(this.selectors.galleryHiddenInput);
            const val = inp.getAttribute('value');
            let arr = val.split(',');
            arr.splice(index, 1);
            inp.value = arr.join(',');
            
            el.closest('li').remove();
        },
        
        
        openFilemanager(e) {
            e.preventDefault();
            
            const val = document.querySelector(this.selectors.galleryHiddenInput).getAttribute('value');
            const arr = val.length ? val.split(',') : [];
            
            filemanager(files => {
                console.log(files);
                files.forEach( (item, i) => {
                    const file = item.split('files/')[1];
                    arr.push(file);
                });
                document.querySelector(this.selectors.galleryHiddenInput).value = arr.join(',');
                
                // Creating gallery sortable cards :)
                this.functions.generateGalleryCards.call(this);
            });
            
        },
        
        
        generateGalleryCards() {
            const inp = document.querySelector(this.selectors.galleryHiddenInput);
            const val = inp.getAttribute('value');
            let arr = val.split(',');
            const galleryContainer = document.querySelector(this.selectors.sortableGalleryContainer);
            galleryContainer.innerHTML = '';
            
            arr.forEach((imgPath, index) => {
                galleryContainer.insertAdjacentHTML('beforeend', `
                    <li data-img="${imgPath}">
                        <div class="uk-position-relative uk-border-rounded uk-card uk-card-default uk-card-body uk-text-center" data-bg="${this.variables.baseurl}/assets/tinyeditor/filemanager/files/${imgPath}">
                            <a data-index="${index}" href="#" uk-icon="icon: trash;" class="uk-icon-button fj-gallery-image-trash"></a>
                        </div>
                    </li>
                `)
            });
            
            document.querySelectorAll('[data-bg]').forEach(bg => {
                const image = bg.getAttribute('data-bg');
                bg.style.background = `url(${image}) no-repeat center / cover`;
            });
        },
        
        
        gallerySort(e) {
            const arr = Array.from(e.target.querySelectorAll('li')).map((li, i) => {
                li.querySelector('a.fj-gallery-image-trash').setAttribute('data-index', i);
                return li.getAttribute('data-img');
            });
            console.log(arr);
            document.querySelector(this.selectors.galleryHiddenInput).value = arr.join(',');
        },
        
        
        removeThumb(e) {
            e.preventDefault();
            document.querySelector(`${this.selectors.thumbnail} img`).setAttribute('hidden', true);
            this.lib(this.selectors.thumbInput).val('');
        },
        
        changeThumb(e) {
            const input = e.target;
            const reader = new FileReader();
            const img = document.querySelector(`${this.selectors.thumbnail} img`);
            img.removeAttribute('hidden');
            
            reader.onload = (e) => img.setAttribute('src', e.target.result);
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    
}