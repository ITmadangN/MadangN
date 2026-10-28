
(function(){
  var overlay  = document.getElementById('lb-overlay');
  var imgEl    = document.getElementById('lb-img');
  var loading  = document.getElementById('lb-loading');
  var closeTop = document.getElementById('lb-close-top');
  var prevBtn  = document.getElementById('lb-prev');
  var nextBtn  = document.getElementById('lb-next');
  var counter  = document.getElementById('lb-counter');
  var images = [], cur = 0;

  function collectImages() {
    var slides = document.querySelectorAll('.swiper-main .swiper-slide img');
    var list = [];
    slides.forEach(function(img){
      var src = img.getAttribute('src') || img.getAttribute('data-src') || '';
      if (src && list.indexOf(src) === -1) list.push(src);
    });
    return list;
  }

  function showImage(index) {
    imgEl.style.display = 'none';
    loading.style.display = 'block';
    loading.textContent = 'Loading...';
    counter.textContent = (index + 1) + ' / ' + images.length;
    var tmp = new Image();
    tmp.onload = function(){ imgEl.src = images[index]; imgEl.style.display = 'block'; loading.style.display = 'none'; };
    tmp.onerror = function(){ loading.textContent = '이미지를 불러올 수 없습니다.'; };
    tmp.src = images[index];
  }

  function open(index) {
    images = collectImages();
    if (!images.length) return;
    cur = Math.max(0, Math.min(index, images.length - 1));
    document.body.classList.add('lb-open');
    document.documentElement.style.overflow = 'hidden';
    document.body.style.overflow = 'hidden';
    overlay.classList.add('on');
    showImage(cur);
  }

  function close() {
    overlay.classList.remove('on');
    document.body.classList.remove('lb-open');
    document.documentElement.style.overflow = '';
    document.body.style.overflow = '';
    imgEl.src = ''; imgEl.style.display = 'none';
    loading.style.display = 'block'; loading.textContent = 'Loading...';
  }

  function prev() { cur = (cur - 1 + images.length) % images.length; showImage(cur); }
  function next() { cur = (cur + 1) % images.length; showImage(cur); }

  document.addEventListener('click', function(e){
    if (e.target.closest('#lb-overlay')) return;
    var slide = e.target.closest('.swiper-main .swiper-slide');
    if (!slide) return;
    var clickedImg = slide.querySelector('img');
    var clickedSrc = clickedImg ? (clickedImg.getAttribute('src') || clickedImg.getAttribute('data-src')) : '';
    images = collectImages();
    var idx = images.indexOf(clickedSrc);
    open(idx >= 0 ? idx : 0);
  });

  closeTop.addEventListener('click', close);
  prevBtn.addEventListener('click', prev);
  nextBtn.addEventListener('click', next);
  overlay.addEventListener('click', function(e){ if (e.target === overlay) close(); });

  document.addEventListener('keydown', function(e){
    if (!overlay.classList.contains('on')) return;
    if (e.key === 'ArrowLeft') prev();
    if (e.key === 'ArrowRight') next();
    if (e.key === 'Escape') close();
  });

  var touchStartX = 0;
  overlay.addEventListener('touchstart', function(e){ touchStartX = e.changedTouches[0].clientX; }, {passive:true});
  overlay.addEventListener('touchend', function(e){
    var dx = e.changedTouches[0].clientX - touchStartX;
    if (Math.abs(dx) > 50) { dx < 0 ? next() : prev(); }
  }, {passive:true});
})();