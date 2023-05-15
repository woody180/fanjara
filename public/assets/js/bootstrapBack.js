const baseurl = document.querySelector('meta[name="baseurl"]') ? document.querySelector('meta[name="baseurl"]').getAttribute('content') : alert('Add <meta name="baseurl" content="website-url" /> baseurl meta tag!');


import ProductController from './Controllers/ProductController.js';
new ProductController({baseurl});