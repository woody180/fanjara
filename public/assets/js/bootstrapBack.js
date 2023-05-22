const baseurl = document.querySelector('meta[name="baseurl"]') ? document.querySelector('meta[name="baseurl"]').getAttribute('content') : alert('Add <meta name="baseurl" content="website-url" /> baseurl meta tag!');


if (document.body.classList.contains('load-tinyeditor')) {
    new FgTinyEditor({
        selector: '.editable',
        rootPath: baseurl + '/assets/tinyeditor',
        saveUrl: baseurl + '/' + 'save',
        defaultTools: true, // Default is true
        loadjQuery: true
    });
}


import ProductController from './Controllers/ProductController.js';
new ProductController({baseurl});
