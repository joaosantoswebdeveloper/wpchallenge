(()=>{var e={1991:(e,t)=>{var r;!function(){"use strict";var n=function(){function e(){}function t(e,t){for(var r=t.length,n=0;n<r;++n)o(e,t[n])}e.prototype=Object.create(null);var r={}.hasOwnProperty,n=/\s+/;function o(e,o){if(o){var a=typeof o;"string"===a?function(e,t){for(var r=t.split(n),o=r.length,a=0;a<o;++a)e[r[a]]=!0}(e,o):Array.isArray(o)?t(e,o):"object"===a?function(e,t){if(t.toString===Object.prototype.toString||t.toString.toString().includes("[native code]"))for(var n in t)r.call(t,n)&&(e[n]=!!t[n]);else e[t.toString()]=!0}(e,o):"number"===a&&function(e,t){e[t]=!0}(e,o)}}return function(){for(var r=arguments.length,n=Array(r),o=0;o<r;o++)n[o]=arguments[o];var a=new e;t(a,n);var l=[];for(var i in a)a[i]&&l.push(i);return l.join(" ")}}();e.exports?(n.default=n,e.exports=n):void 0===(r=function(){return n}.apply(t,[]))||(e.exports=r)}()},9835:(e,t,r)=>{e.exports=r(3419)},3419:(e,t)=>{function r(e){var t=0;if(0==e.length)return t;for(var r=0;r<e.length;r++)t=(t<<5)-t+e.charCodeAt(r),t&=t;return t}function n(e,t){t=t||62;var r,n=[],o="",a=e<0?"-":"";function l(e){return"0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"[e]}for(e=Math.abs(e);e>=t;)r=e%t,e=Math.floor(e/t),n.push(l(r));e>0&&n.push(l(e));for(var i=n.length-1;i>=0;i--)o+=n[i];return a+o}t.bitwise=r,t.binaryTransfer=n,t.unique=function(e){return n(r(e),61).replace("-","Z")},t.random=function(e){for(var t="",r=e||8,n=0;n<r;n++){var o=Math.floor(61*Math.random());t+="0123456789ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz".substring(o,o+1)}return t}}},t={};function r(n){var o=t[n];if(void 0!==o)return o.exports;var a=t[n]={exports:{}};return e[n](a,a.exports,r),a.exports}r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{"use strict";var e=r(9835);const t=window.wp.element,n=window.wp.hooks,o=window.wp.blockEditor;var a=r(1991),l=r.n(a),i=["label","help","className","children"];function u(){return u=Object.assign?Object.assign.bind():function(e){for(var t=1;t<arguments.length;t++){var r=arguments[t];for(var n in r)Object.prototype.hasOwnProperty.call(r,n)&&(e[n]=r[n])}return e},u.apply(this,arguments)}function c(e){var t=e.label,r=e.help,n=e.className,o=e.children,a=function(e,t){if(null==e)return{};var r,n,o=function(e,t){if(null==e)return{};var r,n,o={},a=Object.keys(e);for(n=0;n<a.length;n++)r=a[n],t.indexOf(r)>=0||(o[r]=e[r]);return o}(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(n=0;n<a.length;n++)r=a[n],t.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(e,r)&&(o[r]=e[r])}return o}(e,i);return wp.element.createElement("div",u({},a,{className:l()("lazyblocks-component-base-control",n)}),t?wp.element.createElement("div",{className:"lazyblocks-component-base-control__label"},t):null,o,r?wp.element.createElement("div",{className:"lazyblocks-component-base-control__help"},r):null)}var f=(window.lazyblocksConstructorData||window.lazyblocksGutenberg).controls,s=void 0===f?{}:f;function p(e){return p="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},p(e)}var b=["className"];function y(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function d(e,t,r){return(t=function(e){var t=function(e,t){if("object"!==p(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var n=r.call(e,"string");if("object"!==p(n))return n;throw new TypeError("@@toPrimitive must return a primitive value.")}return String(e)}(e);return"symbol"===p(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function v(e){var t,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},n=r.className,o=function(e,t){if(null==e)return{};var r,n,o=function(e,t){if(null==e)return{};var r,n,o={},a=Object.keys(e);for(n=0;n<a.length;n++)r=a[n],t.indexOf(r)>=0||(o[r]=e[r]);return o}(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(n=0;n<a.length;n++)r=a[n],t.indexOf(r)>=0||Object.prototype.propertyIsEnumerable.call(e,r)&&(o[r]=e[r])}return o}(r,b),a=(t=e.data.type)&&s[t]?s[t]:!!s.undefined&&s.undefined,i=function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?y(Object(r),!0).forEach((function(t){d(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):y(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({label:!!a.restrictions.label_settings&&e.data.label,help:!!a.restrictions.help_settings&&e.data.help,className:l()("lazyblocks-control lazyblocks-control-".concat(e.data.type),n),"data-lazyblocks-control-name":e.data.name},o);return i}function m(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,n=new Array(t);r<t;r++)n[r]=e[r];return n}function g(r){var n,a,l=(n=(0,t.useState)(e.unique("".concat(new Date))),a=2,function(e){if(Array.isArray(e))return e}(n)||function(e,t){var r=null==e?null:"undefined"!=typeof Symbol&&e[Symbol.iterator]||e["@@iterator"];if(null!=r){var n,o,_x,a,l=[],_n=!0,i=!1;try{if(_x=(r=r.call(e)).next,0===t){if(Object(r)!==r)return;_n=!1}else for(;!(_n=(n=_x.call(r)).done)&&(l.push(n.value),l.length!==t);_n=!0);}catch(e){i=!0,o=e}finally{try{if(!_n&&null!=r.return&&(a=r.return(),Object(a)!==a))return}finally{if(i)throw o}}return l}}(n,a)||function(e,t){if(e){if("string"==typeof e)return m(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);return"Object"===r&&e.constructor&&(r=e.constructor.name),"Map"===r||"Set"===r?Array.from(e):"Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r)?m(e,t):void 0}}(n,a)||function(){throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()),i=l[0],u=l[1];return wp.element.createElement(c,v(r),wp.element.createElement(o.__experimentalLinkControl,{key:i,className:"wp-block-navigation-link__inline-link-input",opensInNewTab:!1,value:{url:r.getValue()},onChange:function(e){var t=e.url,n=void 0===t?"":t;r.onChange(n)},onRemove:function(){r.onChange(""),u(e.unique("".concat(new Date)))}}))}(0,n.addFilter)("lzb.editor.control.url.render","lzb.editor",(function(e,t){return wp.element.createElement(g,t)})),(0,n.addFilter)("lzb.editor.control.url.validate","lzb.editor",(function(e,t){return t?/^(?:(?:(?:https?|ftp):)?\/\/)(?:\S+(?::\S*)?@)?(?:(?!(?:10|127)(?:\.\d{1,3}){3})(?!(?:169\.254|192\.168)(?:\.\d{1,3}){2})(?!172\.(?:1[6-9]|2\d|3[0-1])(?:\.\d{1,3}){2})(?:[1-9]\d?|1\d\d|2[01]\d|22[0-3])(?:\.(?:1?\d{1,2}|2[0-4]\d|25[0-5])){2}(?:\.(?:[1-9]\d?|1\d\d|2[0-4]\d|25[0-4]))|(?:(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)(?:\.(?:[a-z\u00a1-\uffff0-9]-*)*[a-z\u00a1-\uffff0-9]+)*(?:\.(?:[a-z\u00a1-\uffff]{2,})))(?::\d{2,5})?(?:[/?#]\S*)?$/i.test(t)?e:{valid:!1,message:"Please enter a valid URL."}:{valid:!1}}))})()})();