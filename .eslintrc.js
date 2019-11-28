module.exports = {
    "env": {
        "browser": true,
        "es6": true
    },
    "extends": [
        "eslint:recommended",
        "plugin:vue/recommended"
    ],
    "globals": {
        "Atomics": "readonly",
        "SharedArrayBuffer": "readonly"
    },
    "parserOptions": {
        "ecmaVersion": 2018,
        "sourceType": "module"
    },
    "plugins": [
        "vue"
    ],
    "rules": {
        "vue/max-attributes-per-line": "off",
        "quotes": ["error", "single"],
        "eqeqeq": ["error", "always"],
        "no-else-return": ["error", {allowElseIf: false}],
        "no-eval": "error",
        "no-script-url": "error",
        "no-useless-return": "error",
        "no-multiple-empty-lines": ["error", {max: 1}],
        "arrow-body-style": ["error", "as-needed"],
        "no-var": "error",
        "object-shorthand": "error",
        "prefer-arrow-callback": "error"
    }
};
