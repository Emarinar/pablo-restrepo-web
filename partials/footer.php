<?php $base = $config['site']['base_url']; ?>
</main>

<footer class="footer">
  <div class="container footer__grid">
    <div>
      <div class="footer__title"><?= e($config['site']['name']) ?></div>
      <div class="footer__muted"><?= e($config['site']['slogan']) ?> · Envigado</div>
      <div class="footer__partyCard">
            <img src="<?= e($base) ?>/assets/img/logo-liberal.png" alt="Partido Liberal" class="footer__partyLogo">
            <div>
                <div class="footer__partyTitle">Movimiento</div>
                <div class="footer__partyName">Partido Liberal</div>
            </div>
      </div>
    </div>

    <div>
      <div class="footer__title">Redes</div>
      <div class="social">
        <a class="social__icon" href="<?= e($config['social']['facebook']) ?>" target="_blank" rel="noopener">Fb</a>
        <a class="social__icon" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener">Ig</a>
        <a class="social__icon" href="<?= e($config['social']['x']) ?>" target="_blank" rel="noopener">X</a>
        <a class="social__icon" href="<?= e($config['social']['youtube']) ?>" target="_blank" rel="noopener">Yt</a>
        <a class="social__icon" href="<?= e($config['social']['tiktok']) ?>" target="_blank" rel="noopener">Tk</a>
        <a class="social__icon" href="<?= e($config['social']['whatsapp']) ?>" target="_blank" rel="noopener">Wa</a>
      </div>
    </div>
  </div>

  <div class="container footer__bottom">
    <small>© <?= date('Y') ?> <?= e($config['site']['domain']) ?>. Todos los derechos reservados.</small>
  </div>
</footer>

<a class="wa-float" href="<?= e($config['social']['whatsapp']) ?>" target="_blank" rel="noopener" aria-label="WhatsApp">
  <span class="wa-float__icon">Wa</span>
  <span class="wa-float__text">WhatsApp</span>
</a>

<script src="<?= e($base) ?>/assets/js/hero-blur.js" defer></script>
<script src="<?= e($base) ?>/assets/js/reveal.js" defer></script>
<script src="<?= e($base) ?>/assets/js/main.js"></script>
</body>
</html>