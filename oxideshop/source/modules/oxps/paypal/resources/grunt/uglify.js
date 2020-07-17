module.exports = {

    options: {
        preserveComments: false
    },
    moduleproduction: {
        files: {
            "../out/src/js/paypal.min.js": "build/js/paypal.js",
            "../out/src/js/paypal-admin.min.js": "build/js/paypal-admin.js"
        }
    }
};