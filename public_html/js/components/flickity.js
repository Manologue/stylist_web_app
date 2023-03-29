var elem = document.querySelector('.main-carousel')
console.log(elem)
var flkty = new Flickity(elem, {
  cellAlign: 'left',
  wrapAround: true,
  freeScroll: true,
  // prevNextButtons: false,
  autoPlay: true,
  contain: true,
})
