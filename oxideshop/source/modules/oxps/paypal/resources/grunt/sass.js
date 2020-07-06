const sass = require('node-sass');

module.exports = {
    moduleproduction: {
        options: {
            implementation: sass,
            update: true,
            style: 'compressed'
        },
        files: {
            "../out/src/css/paypal.css": "build/scss/paypal.scss",
            "../out/src/css/paypal-admin.css": "build/scss/paypal-admin.scss",
        }
    }
};

