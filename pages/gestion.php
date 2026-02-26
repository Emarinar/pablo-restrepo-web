<?php
$base  = $config['site']['base_url'];
$title = "De la Mano con la Gente | " . $config['site']['name'];
?>

<!-- =========================
     HERO PRO (MISMO ESTILO "QUIÉN SOY")
========================= -->
<section class="pageHero pageHero--gestion">
  <div class="pageHero__bg" style="background-image:url('<?= e($base) ?>/assets/img/hero-bg.jpg')"></div>
  <div class="pageHero__overlay"></div>

  <div class="container pageHero__inner">
    <div class="gestionHero">
      <div class="gestionHero__panel">
        <div class="gestionHero__kicker">Gestión</div>

        <h1 class="gestionHero__title">De la Mano con la Gente</h1>

        <p class="gestionHero__lead">
          Acciones con la comunidad: escucha, acompañamiento y resultados que se ven.
        </p>

        <div class="gestionHero__row">
          <div class="gestionHero__pills" aria-label="Ejes de gestión">
            <span class="pill">Territorio</span>
            <span class="pill">Participación</span>
            <span class="pill">Soluciones</span>
            <span class="pill">Seguimiento</span>
          </div>

          <a class="btn btn--primary gestionHero__cta" href="<?= e($base) ?>/contacto">Quiero proponer algo</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- =========================
     CONTENIDO
========================= -->
<section class="section">
  <div class="container">

    <div class="sectionHead">
      <h2 class="h2">Líneas de trabajo</h2>
      <p class="muted">Aquí vamos cargando la gestión real (fotos, evidencias, documentos, resultados).</p>
    </div>

    <div class="cards3">
      <article class="card card--pad">
        <h3 class="h3">Educación y oportunidades</h3>
        <p class="muted">Proyectos y acompañamiento para fortalecer el futuro desde la formación.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/contacto">Quiero apoyar</a>
      </article>

      <article class="card card--pad">
        <h3 class="h3">Seguridad y convivencia</h3>
        <p class="muted">Trabajo articulado con comunidad para entornos más tranquilos y responsables.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/contacto">Reportar necesidad</a>
      </article>

      <article class="card card--pad">
        <h3 class="h3">Gestión social cercana</h3>
        <p class="muted">Presencia en barrios, escucha activa y soluciones con seguimiento.</p>
        <a class="btn btn--ghost" href="<?= e($base) ?>/contacto">Escríbeme</a>
      </article>
    </div>

    <div class="divider" style="margin:24px 0;"></div>

    <div class="grid2">
      <article class="card card--pad">
        <h3 class="h3">Resultados (plantilla)</h3>
        <p class="muted">Esto lo llenamos con datos reales verificados:</p>

        <ul class="list">
          <li>✅ Reuniones comunitarias realizadas</li>
          <li>✅ Proyectos/gestiones acompañadas</li>
          <li>✅ Solicitudes tramitadas</li>
          <li>✅ Jornadas/actividades en territorio</li>
        </ul>

        <div class="notice">
          <strong>Tip:</strong> aquí podemos montar un “Timeline” por año y un filtro por barrio/comuna.
        </div>
      </article>

      <aside class="card card--pad">
        <h3 class="h3">¿Tienes una necesidad en tu sector?</h3>
        <p class="muted">Cuéntame tu caso y le damos ruta: recepción → priorización → gestión → seguimiento.</p>
        <a class="btn btn--primary" href="<?= e($base) ?>/contacto">Enviar solicitud</a>
      </aside>
    </div>

  </div>
</section>