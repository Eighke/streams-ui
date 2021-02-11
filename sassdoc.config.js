const extras = require('sassdoc-extras');

module.exports = function (dest, ctx) {

    return extras(ctx, 'description', 'markdown', 'display', 'byGroupAndType', 'byType', 'groupName', 'shortcutIcon', 'sort', 'resolveVariables');

};
