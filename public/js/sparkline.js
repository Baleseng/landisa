/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sparkline.js":
/*!***********************************!*\
  !*** ./resources/js/sparkline.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

/**
 * Create a constructor for sparklines that takes some sensible defaults and merges in the individual
 * chart options. This function is also available from the jQuery plugin as $(element).highcharts('SparkLine').
 */
Highcharts.SparkLine = function (a, b, c) {
  var hasRenderToArg = typeof a === 'string' || a.nodeName,
      options = arguments[hasRenderToArg ? 1 : 0],
      defaultOptions = {
    chart: {
      renderTo: options.chart && options.chart.renderTo || this,
      backgroundColor: null,
      borderWidth: 0,
      type: 'area',
      margin: [2, 0, 2, 0],
      width: 160,
      height: 50,
      style: {
        overflow: 'visible'
      },
      // small optimalization, saves 1-2 ms each sparkline
      skipClone: true
    },
    title: {
      text: ''
    },
    credits: {
      enabled: false
    },
    xAxis: {
      labels: {
        enabled: false
      },
      title: {
        text: null
      },
      startOnTick: false,
      endOnTick: false,
      tickPositions: []
    },
    yAxis: {
      endOnTick: false,
      startOnTick: false,
      labels: {
        enabled: false
      },
      title: {
        text: null
      },
      tickPositions: [0]
    },
    legend: {
      enabled: false
    },
    tooltip: {
      backgroundColor: null,
      borderWidth: 0,
      shadow: false,
      useHTML: true,
      hideDelay: 0,
      shared: true,
      padding: 0,
      positioner: function positioner(w, h, point) {
        return {
          x: point.plotX - w / 2,
          y: point.plotY - h
        };
      }
    },
    plotOptions: {
      series: {
        animation: false,
        lineWidth: 1,
        shadow: false,
        states: {
          hover: {
            lineWidth: 1
          }
        },
        marker: {
          radius: 1,
          states: {
            hover: {
              radius: 2
            }
          }
        },
        fillOpacity: 0.25
      },
      column: {
        negativeColor: '#910000',
        borderColor: 'silver'
      }
    }
  };
  options = Highcharts.merge(defaultOptions, options);
  return hasRenderToArg ? new Highcharts.Chart(a, options, c) : new Highcharts.Chart(options, b);
};

var start = +new Date(),
    $tds = $('span[data-sparkline]'),
    fullLen = $tds.length,
    n = 0; // Creating 153 sparkline charts is quite fast in modern browsers, but IE8 and mobile
// can take some seconds, so we split the input into chunks and apply them in timeouts
// in order avoid locking up the browser process and allow interaction.

function doChunk() {
  var time = +new Date(),
      i,
      len = $tds.length,
      $span,
      stringdata,
      arr,
      data,
      chart;

  for (i = 0; i < len; i += 1) {
    $td = $($tds[i]);
    stringdata = $td.data('sparkline');
    arr = stringdata.split('; ');
    data = $.map(arr[0].split(', '), parseFloat);
    chart = {};

    if (arr[1]) {
      chart.type = arr[1];
    }

    $td.highcharts('SparkLine', {
      series: [{
        data: data,
        pointStart: 1
      }],
      tooltip: {
        headerFormat: '<span style="font-size: 10px">' + $td.parent().find('th').html() + ', Q{point.x}:</span><br/>',
        pointFormat: '<b>{point.y}.000</b> ZAR'
      },
      chart: chart
    });
    n += 1; // If the process takes too much time, run a timeout to allow interaction with the browser

    if (new Date() - time > 500) {
      $tds.splice(0, i + 1);
      setTimeout(doChunk, 0);
      break;
    }
  }
}

doChunk();

/***/ }),

/***/ 6:
/*!*****************************************!*\
  !*** multi ./resources/js/sparkline.js ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/stephenmokgosi/landisa/resources/js/sparkline.js */"./resources/js/sparkline.js");


/***/ })

/******/ });