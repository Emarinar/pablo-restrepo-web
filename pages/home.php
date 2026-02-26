<?php $base = $config['site']['base_url']; ?>

<!-- =========================
     HERO
========================= -->
<section class="hero">
  <div class="hero__bg" style="background-image:url('<?= e($base) ?>/assets/img/hero-bg.jpg')"></div>
  <div class="hero__overlay"></div>

  <div class="container hero__inner">

    <!-- CONTENIDO IZQUIERDA -->
    <div class="hero__content">

      <div class="hero__sloganImg reveal">
        <img src="<?= e($base) ?>/assets/img/slogan.png" alt="De la mano con la gente">
      </div>

      <!-- STACK UNIFORME: role + CTA + social + stats -->
      <div class="hero__stack">

        <p class="hero__role reveal" style="transition-delay:.06s">
          Concejal de Envigado
        </p>

        <!-- CTA + Redes (debajo del slogan) -->
        <div class="hero__underSlogan reveal" style="transition-delay:.10s">
          <a class="btn btn--primary btn--lg" href="<?= e($base) ?>/contacto">Contáctame</a>

          <div class="hero__social" aria-label="Redes sociales">
            <a class="socialBtn" href="<?= e($config['social']['facebook']) ?>" target="_blank" rel="noopener" aria-label="Facebook">
              <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 22v-8h2.7l.4-3H13.5V9.2c0-.9.3-1.6 1.6-1.6H16.7V5a22 22 0 0 0-2.4-.1c-2.4 0-4 1.5-4 4.2V11H7.7v3h2.6v8h3.2z"/></svg>
            </a>

            <a class="socialBtn" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener" aria-label="Instagram">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M7.5 2h9A5.5 5.5 0 0 1 22 7.5v9A5.5 5.5 0 0 1 16.5 22h-9A5.5 5.5 0 0 1 2 16.5v-9A5.5 5.5 0 0 1 7.5 2zm0 2A3.5 3.5 0 0 0 4 7.5v9A3.5 3.5 0 0 0 7.5 20h9a3.5 3.5 0 0 0 3.5-3.5v-9A3.5 3.5 0 0 0 16.5 4h-9z"/>
                <path d="M12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10zm0 2a3 3 0 1 0 0 6 3 3 0 0 0 0-6z"/>
                <path d="M17.6 6.3a1.1 1.1 0 1 1-2.2 0 1.1 1.1 0 0 1 2.2 0z"/>
              </svg>
            </a>

            <a class="socialBtn" href="<?= e($config['social']['x']) ?>" target="_blank" rel="noopener" aria-label="X">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M18.3 2H21l-6.7 7.7L22 22h-6.5l-5.1-6.2L5 22H2.3l7.3-8.4L2 2h6.7l4.6 5.6L18.3 2zm-1.1 18h1.6L7.9 3.9H6.2L17.2 20z"/>
              </svg>
            </a>

            <a class="socialBtn" href="<?= e($config['social']['youtube']) ?>" target="_blank" rel="noopener" aria-label="YouTube">
              <svg viewBox="0 0 24 24" aria-hidden="true">
                <path d="M21.6 7.2s-.2-1.6-.9-2.3c-.9-.9-1.9-.9-2.4-1C14.9 3.6 12 3.6 12 3.6h0s-2.9 0-6.3.3c-.5.1-1.5.1-2.4 1-.7.7-.9 2.3-.9 2.3S2 9.1 2 11v2c0 1.9.4 3.8.4 3.8s.2 1.6.9 2.3c.9.9 2.1.9 2.7 1C8.3 20.4 12 20.4 12 20.4s2.9 0 6.3-.3c.5-.1 1.5-.1 2.4-1 .7-.7.9-2.3.9-2.3S22 14.9 22 13v-2c0-1.9-.4-3.8-.4-3.8z"/>
                <path d="M10 15.5V8.5L16 12l-6 3.5z"/>
              </svg>
            </a>
          </div>
        </div>

        <!-- Mini-stats -->
        <div class="hero__stats reveal" style="transition-delay:.16s">
          <div class="stat">
            <div class="stat__num">+120</div>
            <div class="stat__label">Gestiones con la comunidad</div>
          </div>

          <div class="stat">
            <div class="stat__num">+45</div>
            <div class="stat__label">Proyectos acompañados</div>
          </div>

          <div class="stat">
            <div class="stat__num">14</div>
            <div class="stat__label">Años de servicio público</div>
          </div>
        </div>

      </div><!-- /hero__stack -->

    </div><!-- /hero__content -->

    <!-- FOTO DERECHA -->
    <div class="hero__photoWrap">
      <img
        src="<?= e($base) ?>/assets/img/pablo.png"
        alt="Pablo Andrés Restrepo Garcés"
        class="hero__photo reveal"
        style="transition-delay:.10s"
        loading="eager"
      >
    </div>

  </div>
</section>

<!-- =========================
     MÓDULOS / CARDS
========================= -->
<section class="modules">
  <div class="container">
    <div class="modules__grid">

      <article class="moduleCard reveal">
        <div class="moduleCard__icon">👤</div>
        <h3 class="moduleCard__title">¿Quién Soy?</h3>
        <p class="moduleCard__text">Conoce mi historia, valores y trayectoria al servicio de Envigado.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/quien-soy">Leer más</a>
      </article>

      <article class="moduleCard reveal" style="transition-delay:.06s">
        <div class="moduleCard__icon">🤝</div>
        <h3 class="moduleCard__title">De la Mano con la Gente</h3>
        <p class="moduleCard__text">Gestión real con la comunidad: resultados, proyectos y acompañamiento.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/de-la-mano-con-la-gente">Leer más</a>
      </article>

      <article class="moduleCard reveal" style="transition-delay:.12s">
        <div class="moduleCard__icon">📣</div>
        <h3 class="moduleCard__title">Noticias</h3>
        <p class="moduleCard__text">Actualizaciones, comunicados y agenda pública.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/noticias">Leer más</a>
      </article>

    </div>
  </div>
</section>