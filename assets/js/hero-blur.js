(() => {
  const root = document.documentElement;
  const maxBlur = 6; // px (sutil y elegante)
  const maxScroll = 420; // cuánto scroll para llegar al blur máximo

  const onScroll = () => {
    const y = Math.max(0, Math.min(maxScroll, window.scrollY));
    const blur = (y / maxScroll) * maxBlur;
    root.style.setProperty('--hero-blur', blur.toFixed(2) + 'px');
  };

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
})();