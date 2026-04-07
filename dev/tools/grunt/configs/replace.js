/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

'use strict';

var nlWin = '\r\n',
    nlUnix = '\n';

function findCopyright(lang, nlSys) {
<<<<<<< HEAD
    var currentYear = new Date().getFullYear(),
        copyrightText = {
            firstLine: 'Copyright ' + currentYear + ' Adobe',
            secondLine: 'All Rights Reserved.'
        };
=======
    var copyrightText = {
        firstLine: 'Copyright © Magento, Inc. All rights reserved.',
        secondLine: 'See COPYING.txt for license details.'
    };
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    switch (lang) {
        case 'less':
            return new RegExp(
                '// /\\*\\*' + nlSys + '//  \\* ' +
                copyrightText.firstLine +
                '' + nlSys + '//  \\* ' +
                copyrightText.secondLine +
                '' + nlSys + '//  \\*/' + nlSys + nlSys
            );
            break;
        default:
            return;
    }
}

module.exports = {
    documentation: {
        options: {
            patterns: [
                {
                    match: findCopyright('less', nlWin),
                    replacement: ''
                },
                {
                    match: findCopyright('less', nlUnix),
                    replacement: ''
                }
            ]
        },
        files: [{
            expand: true,
            flatten: true,
            src: [
                '<%= path.doc %>/source/**/*.less'
            ],
            dest: '<%= path.doc %>/source/'
        }]
    }

};
