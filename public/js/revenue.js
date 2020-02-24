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
/******/ 	return __webpack_require__(__webpack_require__.s = 23);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin-chart-revenue.js":
/*!*********************************************!*\
  !*** ./resources/js/admin-chart-revenue.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

Highcharts.setOptions({
  chart: {
    inverted: true,
    marginLeft: 135,
    type: 'bullet'
  },
  title: {
    text: null
  },
  legend: {
    enabled: false
  },
  yAxis: {
    gridLineWidth: 0
  },
  plotOptions: {
    series: {
      pointPadding: 0.25,
      borderWidth: 0,
      color: '#000',
      targetOptions: {
        width: '200%'
      }
    }
  },
  credits: {
    enabled: false
  },
  exporting: {
    enabled: false
  }
});
Highcharts.chart('revenues', {
  chart: {
    marginTop: 40
  },
  title: {
    text: '2017 YTD'
  },
  xAxis: {
    categories: ['<span class="hc-cat-title">Revenue</span><br/>U.S. $ (1,000s)']
  },
  yAxis: {
    plotBands: [{
      from: 0,
      to: 150,
      color: '#666'
    }, {
      from: 150,
      to: 225,
      color: '#999'
    }, {
      from: 225,
      to: 9e9,
      color: '#bbb'
    }],
    title: null
  },
  series: [{
    data: [{
      y: 275,
      target: 250
    }]
  }],
  tooltip: {
    pointFormat: '<b>{point.y}</b> (with target at {point.target})'
  }
});
Highcharts.chart('profits', {
  xAxis: {
    categories: ['<span class="hc-cat-title">Profit</span><br/>%']
  },
  yAxis: {
    plotBands: [{
      from: 0,
      to: 20,
      color: '#666'
    }, {
      from: 20,
      to: 25,
      color: '#999'
    }, {
      from: 25,
      to: 100,
      color: '#bbb'
    }],
    labels: {
      format: '{value}%'
    },
    title: null
  },
  series: [{
    data: [{
      y: 22,
      target: 27
    }]
  }],
  tooltip: {
    pointFormat: '<b>{point.y}</b> (with target at {point.target})'
  }
});
Highcharts.chart('clients', {
  xAxis: {
    categories: ['<span class="hc-cat-title">New Customers</span><br/>Count']
  },
  yAxis: {
    plotBands: [{
      from: 0,
      to: 1400,
      color: '#666'
    }, {
      from: 1400,
      to: 2000,
      color: '#999'
    }, {
      from: 2000,
      to: 9e9,
      color: '#bbb'
    }],
    labels: {
      format: '{value}'
    },
    title: null
  },
  series: [{
    data: [{
      y: 1650,
      target: 2100
    }]
  }],
  tooltip: {
    pointFormat: '<b>{point.y}</b> (with target at {point.target})'
  },
  credits: {
    enabled: true
  }
});

/***/ }),

/***/ 23:
/*!***************************************************!*\
  !*** multi ./resources/js/admin-chart-revenue.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/stephenmokgosi/landisa/resources/js/admin-chart-revenue.js */"./resources/js/admin-chart-revenue.js");


/***/ })

/******/ });