import SketchEngine from '../sketchEngine/SketchEngine.js';


export default class ProductCategoryController extends SketchEngine {
    constructor() {
        super();
        this.variables.baseurl = arguments[0].baseurl;
    }

    
    variables = {};


    execute = [];


    components = [];


    selectors = {
        filemanagerGalleryBtn: '#fg-filemanager-project',
        filemanagerCoverBtn: '#fg-product-category-thumbnail-button',
        sortableImagesContainer: '#fj-thumbnail-preview',
        trashBtn: '.fj-project-category-thumbnail-trash',
        coverHiddenInput: '#fg-product-category-thumbnail-hidden',
        thumbnailPreview: '#fg-product-category-thumbnail-preview img',
        previewRemoveBtn: '.prouct-category-preview-remove'
    };


    html = {}


    catchDOM() {}


    bindEvents() {
        this.lib(this.selectors.filemanagerCoverBtn).on('click', this.functions.filemanagerCover.bind(this));
        this.lib(this.selectors.previewRemoveBtn).on('click', this.functions.removeCoverPreview.bind(this));
    }


    functions = {
        removeCoverPreview(e)
        {
            e.preventDefault();
            
            this.lib(this.selectors.coverHiddenInput).val('');
            this.lib(this.selectors.thumbnailPreview).attr('src', `${this.variables.baseurl}/assets/images/not-found.png`);
        },
        
        filemanagerCover(e)
        {
            e.preventDefault();
            
            filemanager(files => {
                const cover = files[0].split('files/')[1];
                this.lib(this.selectors.coverHiddenInput).val(cover);
                this.lib(this.selectors.thumbnailPreview).attr('src', `${this.variables.baseurl}/assets/tinyeditor/filemanager/files/${cover}`);
            });
        }
    }

}