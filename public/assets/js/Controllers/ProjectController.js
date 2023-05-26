import SketchEngine from '../sketchEngine/SketchEngine.js';


export default class ProjectController extends SketchEngine {
        
    constructor() {
        super();
        this.variables.baseurl = arguments[0].baseurl;
    }

    
    variables = {};


    execute = [];


    components = [];


    selectors = {
        filemanagerGalleryBtn: '#fg-filemanager-project',
        filemanagerCoverBtn: '#fg-filemanager-cover',
        sortableImagesContainer: '#projects-sort',
        trashBtn: '.fj-project-image-trash',
        galleryHiddenInput: '#gallery-hidden-input'
    };


    html = {}


    catchDOM() {}


    bindEvents() {
        this.lib(this.selectors.filemanagerGalleryBtn).on('click', this.functions.filemanagerGallery.bind(this));
        this.lib(this.selectors.filemanagerCoverBtn).on('click', this.functions.filemanagerCover.bind(this));
        UIkit.util.on(this.selectors.sortableImagesContainer, 'stop', this.functions.gallerySort.bind(this));
        this.lib('body').on('click', this.functions.imageTrash.bind(this), this.selectors.trashBtn);

    }


    functions = {
        imageTrash(e)
        {
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
        
        gallerySort(e)
        {
            const arr = Array.from(e.target.querySelectorAll('li')).map((li, i) => {
                li.querySelector(this.selectors.trashBtn).setAttribute('data-index', i);
                return li.getAttribute('data-img');
            });
            console.log(arr);
            document.querySelector(this.selectors.galleryHiddenInput).value = arr.join(',');
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
            
            const val = document.querySelector(this.selectors.galleryHiddenInput).getAttribute('value');
            const arr = val.length ? val.split(',') : [];
            
            filemanager(files => {
                const filesArr = files.map(item => item.split('files/')[1]);
                
                filesArr.forEach( (item, i) => arr.push(item));
                
                const imagesStr = arr.join(',');
                this.lib(this.selectors.galleryHiddenInput).val(imagesStr);
                
                
                // Creating gallery sortable cards :)
                this.functions.generateGalleryCards.call(this);
            });
        },
        
        
        
        generateGalleryCards() {
            const inp = document.querySelector(this.selectors.galleryHiddenInput);
            const val = inp.getAttribute('value');
            let arr = val.split(',');
            const galleryContainer = document.querySelector(this.selectors.sortableImagesContainer);
            galleryContainer.innerHTML = '';
            
            console.log(arr);
            
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
    }
}