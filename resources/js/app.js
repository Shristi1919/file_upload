// resources/js/app.js

require('./bootstrap');

// resources/js/app.js

import toastr from 'toastr';
window.toastr = toastr;

// Optional: Customize Toastr settings
toastr.options = {
    closeButton: true,
    progressBar: true,
    positionClass: 'toast-top-right',
    timeOut: 3000  // 3 seconds
};

// Export toastr for global use
window.toastr = toastr;

