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
        sortableGalleryContainer: '#fj-sortable-gallery'
    };


    html = {}


    catchDOM() {}


    bindEvents() {
        this.lib(this.selectors.thumbnail).on('change', this.functions.changeThumb.bind(this));
        this.lib(this.selectors.removeThumb).on('click', this.functions.removeThumb.bind(this));
        UIkit.util.on(this.selectors.sortableGalleryContainer, 'stop', this.functions.gallerySort.bind(this));
        this.lib(this.selectors.filemanagerBtn).on('click', this.functions.openFilemanager.bind(this));
    }


    functions = {
        
        openFilemanager(e) {
            e.preventDefault();
            
            const val = document.querySelector(this.selectors.galleryHiddenInput).getAttribute('value');
            const arr = val.length ? val.split(',') : [];
            
            filemanager(files => {
                console.log(files);
                files.forEach(item => {
                    const file = item.split('files/')[1];
                    arr.push(file);
                    
                    document.querySelector(this.selectors.sortableGalleryContainer).insertAdjacentHTML('afterbegin', `
                        <li data-img="${file}">
                            <div class="uk-position-relative uk-border-rounded uk-card uk-card-default uk-card-body uk-text-center" data-bg="${this.variables.baseurl}/assets/tinyeditor/filemanager/files/${file}">
                                <a href="#" uk-icon="icon: trash;" class="uk-icon-button"></a>
                            </div>
                        </li>
                    `)
                });
                document.querySelector(this.selectors.galleryHiddenInput).value = arr.join(',');
                console.log(arr);

                document.querySelectorAll('[data-bg]').forEach(bg => {
                    const image = bg.getAttribute('data-bg');
                    bg.style.background = `url(${image}) no-repeat center / cover`;
                });
            });
        },
        
        
        gallerySort(e) {
            console.log(e.target);
            const arr = Array.from(e.target.querySelectorAll('li')).map(a => a.getAttribute('data-img'));
            document.querySelector(this.selectors.galleryHiddenInput).value = arr.join(',');
            console.log(arr);
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