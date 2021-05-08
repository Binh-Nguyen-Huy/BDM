"use strict";

function _toConsumableArray(arr) { 
  return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); 
}

function _nonIterableSpread() { 
  throw new TypeError("Invalid attempt to spread non-iterable instance"); 
}

function _iterableToArray(iter) { 
  if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") 
  return Array.from(iter); 
}

function _arrayWithoutHoles(arr) { 
  if (Array.isArray(arr)) { 
    for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { 
      arr2[i] = arr[i]; 
    } 
  return arr2; 
  } 
}

function _objectSpread(target) { 
  for (var i = 1; i < arguments.length; i++) { 
    var source = arguments[i] != null ? arguments[i] : {}; 
    var ownKeys = Object.keys(source); 
    if (typeof Object.getOwnPropertySymbols === 'function') { 
      ownKeys = ownKeys.concat(Object.getOwnPropertySymbols(source).filter(function (sym) { 
        return Object.getOwnPropertyDescriptor(source, sym).enumerable; 
      })); 
    } 
    ownKeys.forEach(function (key) { 
      _defineProperty(target, key, source[key]); 
    }); 
  } 
  return target; 
}

function _defineProperty(obj, key, value) { 
  if (key in obj) { 
    Object.defineProperty(obj, key, { 
      value: value, enumerable: true, configurable: true, writable: true 
    }); 
  } 
  else { 
    obj[key] = value; 
  } 
  return obj; 
}

(function () {
  function ElderCarousel(selector, opts) {
    this.wrapper = null;
    this.wrapperWidth = 0;
    this.track = null;
    this.trackWidth = 0;
    this.trackPosition = 0;
    this.startPosition = 0; 

    this.items = [];
    this.itemWidth = 0;
    this.firstItem = null;

    this.lastItem = null;
    this.settings = _objectSpread({}, ElderCarousel.defaults, opts);
    this.settings.selector = selector;
    this.playInterval = null;
    this.navDisabled = false;
    this.isEnd = false;
    this.isStart = false;
    setup(this);
  }

  ElderCarousel.prototype.next = function () {
    if (!this.settings.loop && this.isEnd || this.items.length === 1) return;
    this.trackPosition -= this.itemWidth * this.settings.step;
    move(this);
  };

  ElderCarousel.prototype.prev = function () {
    this.isStart = Math.abs(this.trackPosition) === 0;
    if (!this.settings.loop && this.isStart || this.items.length === 1) return;
    this.trackPosition += this.itemWidth * this.settings.step;
    move(this);
  };

  ElderCarousel.prototype.goTo = function (index) {
    this.trackPosition = -(index * this.itemWidth);
    move(this);
  };

  ElderCarousel.prototype.play = function () {
    var _this = this;

    clearInterval(this.playInterval);
    this.playInterval = setInterval(function () {
      _this.next();
    }, this.settings.playInterval);
  };

  ElderCarousel.prototype.stop = function () {
    clearInterval(this.playInterval);
  };

  function move(self) {
    self.track.style.transition = "transform ".concat(self.settings.speed, "ms ease");
    self.track.style.transform = "translate3d(".concat(self.trackPosition, "px,0,0)"); 

    if (self.settings.play) self.play();
  }

  function setup(self) {
    if (!buildUI(self)) return; 

    if (self.settings.navs) createNavs(self);
    if (self.settings.play) self.play();
    setTrackStartPosition(self);
    setupEvents(self);
  }

  function buildUI(self) {
    self.wrapper = document.querySelector(self.settings.selector);
    if (!self.wrapper) return false;
    self.wrapper.classList.add("ec");
    self.wrapperWidth = self.wrapper.clientWidth;
    self.itemWidth = parseInt(self.wrapperWidth / self.settings.items);
    self.items = Array.from(self.wrapper.children);
    if (self.items.length === 0) return false;
    self.items.forEach(function (item) {
      item.classList.add('ec__item');
      item.style.width = self.itemWidth + 'px';
    });

    if (self.items.length > 1) {
      var leftClonedItems = self.items.slice(self.items.length - self.settings.items, self.items.length).map(function (item) {
        var clonedItem = item.cloneNode(true);
        clonedItem.classList.add('cloned');
        return clonedItem;
      });
      var rightClonedItems = self.items.slice(0, self.settings.items).map(function (item) {
        var clonedItem = item.cloneNode(true);
        clonedItem.classList.add('cloned');
        return clonedItem;
      });
      self.items = [].concat(_toConsumableArray(leftClonedItems), _toConsumableArray(self.items), _toConsumableArray(rightClonedItems));
    }

    self.track = document.createElement('div');
    self.track.className = 'ec__track';
    self.trackWidth = self.itemWidth * self.items.length;
    self.track.style.width = self.trackWidth + 'px';
    self.items.forEach(function (item) {
      return self.track.appendChild(item);
    });
    var trackHolder = document.createElement('div');
    trackHolder.className = 'ec__holder';
    trackHolder.appendChild(self.track);
    self.wrapper.appendChild(trackHolder);
    return true;
  } 

  function updateUI(self) {
    self.wrapperWidth = self.wrapper.clientWidth;
    self.itemWidth = parseInt(self.wrapperWidth / self.settings.items);
    self.trackWidth = self.itemWidth * self.items.length;
    self.track.style.width = self.trackWidth + 'px';
    self.items.forEach(function (item) {
      return item.style.width = self.itemWidth + 'px';
    });
  } 


  function setupEvents(self) {
    window.addEventListener('resize', function () {
      return updateUI(self);
    }); 
    self.track.addEventListener('transitionstart', function () {
      self.isEnd = Math.abs(self.trackPosition) === self.trackWidth - self.itemWidth * self.settings.step;
    });
    self.track.addEventListener('transitionend', function () {
      if (self.items.length !== 1) {
        self.isEnd = Math.abs(self.trackPosition) === self.trackWidth - self.itemWidth * self.settings.items;
        if (self.isEnd) setTrackStartPosition(self);
        self.isStart = Math.abs(self.trackPosition) === 0;
        if (self.isStart) setTrackEndPosition(self);
      }

      self.navDisabled = false;
    });
  }


  function createNavs(self) {
    var prevNav, nextNav; 

    prevNav = self.settings.prevNav || document.createElement('div');
    prevNav.className = 'ec__nav ec__nav--prev';
    prevNav.setAttribute('role', 'button');
    prevNav.setAttribute('disabled', 'true');
    prevNav.addEventListener('click', function () {
      if (self.navDisabled) return;
      self.navDisabled = true;
      self.prev();
    }); 

    nextNav = self.settings.nextNav || document.createElement('div');
    nextNav.className = 'ec__nav ec__nav--next';
    nextNav.setAttribute('role', 'button');
    nextNav.addEventListener('click', function () {
      if (self.navDisabled) return;
      self.navDisabled = true;
      self.next();
    });
    self.wrapper.appendChild(prevNav);
    self.wrapper.appendChild(nextNav);
  }

  function setTrackStartPosition(self) {
    if (self.items.length === 1) {
      self.trackPosition = 0;
    } else {
      self.startPosition = (self.settings.start + self.settings.items) * self.itemWidth;
      self.trackPosition = self.startPosition * -1;
    }

    setTrackPosition(self);
  }

  function setTrackEndPosition(self) {
    self.endPosition = Math.abs(self.trackPosition) - self.itemWidth * (self.settings.items * 2 + 1);
    self.trackPosition = self.endPosition;
    setTrackPosition(self);
  }

  function setTrackPosition(self) {
    self.track.style.transitionProperty = 'none';
    self.track.style.transform = "translate3d(".concat(self.trackPosition, "px,0,0)");
  }


  ElderCarousel.defaults = {
    selector: '',
    items: 3,
    step: 1,
    speed: 300,
    start: 0,
    pagination: true,
    navs: true,
    loop: true,
    play: false,
    playInterval: 3000
  };
  window.ElderCarousel = ElderCarousel;
})();
