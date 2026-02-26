<?php $base = $config['site']['base_url']; ?>

<section class="pageHero pageHero--about">
  <div class="pageHero__bg" style="background-image:url('<?= e($base) ?>/assets/img/hero-bg.jpg')"></div>
  <div class="pageHero__overlay"></div>

  <div class="container pageHero__inner">
    <div class="aboutHero">
      <div class="aboutHero__panel">
        <div class="aboutHero__kicker">Quién Soy</div>

        <h1 class="aboutHero__title">
          Pablo Andrés<br>Restrepo Garcés
        </h1>

        <p class="aboutHero__lead">
          Un servidor público que cree en la educación, la gratitud y el trabajo cercano con la comunidad.
        </p>

        <div class="aboutHero__row">
          <div class="aboutHero__pills" aria-label="Etiquetas">
            <span class="pill">Envigado</span>
            <span class="pill">Servicio</span>
            <span class="pill">Educación</span>
            <span class="pill">Gestión</span>
          </div>

          <a class="btn btn--primary aboutHero__cta" href="<?= e($base) ?>/contacto">Contáctame</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about">
  <div class="container about__grid">

    <!-- Columna izquierda -->
    <article class="card card--soft">
      <header class="card__head">
        <h2 class="card__title">Mi historia</h2>
        <p class="card__sub">Cercanía, gratitud y servicio con resultados.</p>
      </header>

      <div class="card__body prose">
        <p>
          Soy hijo de Pablo Emilio y Beatriz; hermano de David y esposo de Andrea. Vengo de una familia tradicional
          envigadeña donde aprendí que la gratitud es una virtud que sostiene el carácter, y que el servicio a la
          comunidad le da valor a la existencia.
        </p>

        <p>
          Mi vocación por lo público nace de caminar los barrios, escuchar con respeto y convertir necesidades reales
          en acciones y resultados.
        </p>

        <hr>

        <h3>Formación</h3>
        <ul>
          <li><strong>Administración de Negocios Internacionales</strong> – Institución Universitaria de Envigado.</li>
          <li><strong>Especialización en Mercadeo Gerencial</strong>.</li>
          <li><strong>Maestría en Gobierno</strong> – Universidad de Medellín.</li>
        </ul>

        <p class="note">
          <strong>Para actualizar:</strong> esta sección está lista para reemplazar/ajustar fechas, cargos y logros recientes (últimos 2 años).
        </p>
      </div>
    </article>

    <!-- Columna derecha -->
    <aside class="asideStack">

      <section class="card card--glass">
        <header class="card__head">
          <h2 class="card__title">En cifras</h2>
          <p class="card__sub">Trayectoria y servicio público.</p>
        </header>

        <div class="statsGrid">
          <div class="statMini">
            <div class="statMini__num">42</div>
            <div class="statMini__label">años de vida</div>
          </div>
          <div class="statMini">
            <div class="statMini__num">7</div>
            <div class="statMini__label">años de casado</div>
          </div>
          <div class="statMini">
            <div class="statMini__num">14</div>
            <div class="statMini__label">años empleado público</div>
          </div>
          <div class="statMini">
            <div class="statMini__num">4</div>
            <div class="statMini__label">años como concejal</div>
          </div>
        </div>
      </section>

      <section class="card card--soft">
        <header class="card__head">
          <h2 class="card__title">Principios</h2>
          <p class="card__sub">Así trabajo con la gente.</p>
        </header>

        <div class="card__body">
          <ul class="checks">
            <li>Respeto por la gente y sus realidades.</li>
            <li>Trabajo con presencia en el territorio.</li>
            <li>Gestión transparente y con propósito.</li>
            <li>Educación como prioridad para el desarrollo.</li>
          </ul>
        </div>

        <footer class="party">
          <img src="<?= e($base) ?>/assets/img/logo-liberal.png" alt="Partido Liberal" class="party__logo">
          <div class="party__text">
            <div class="party__kicker">Movimiento</div>
            <div class="party__name">Partido Liberal</div>
          </div>
        </footer>
      </section>

    </aside>

  </div>
</section>