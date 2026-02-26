<?php
$base  = $config['site']['base_url'];
$title = "Noticias | " . $config['site']['name'];

require_once __DIR__ . '/../lib/instagram.php';
$ig = instagram_get_posts($config, __DIR__ . '/../cache/instagram.json', 3600);

/**
 * Noticias desde JSON
 */
$newsFile = __DIR__ . '/../cache/noticias.json';
$news = [];

if (is_file($newsFile)) {
  $raw = file_get_contents($newsFile);
  $decoded = json_decode($raw, true);
  if (is_array($decoded)) $news = $decoded;
}

function format_date_es(string $date): string {
  $ts = strtotime($date);
  if (!$ts) return $date;
  $months = ['enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre'];
  $d = (int)date('d', $ts);
  $m = $months[(int)date('m', $ts) - 1] ?? '';
  $y = date('Y', $ts);
  return $d . ' ' . $m . ' ' . $y;
}

function safe_url(string $base, ?string $path): string {
  if (!$path) return '';
  $path = ltrim($path, '/');
  return rtrim($base, '/') . '/' . $path;
}

function wa_link(?array $wa): string {
  if (!$wa || empty($wa['telefono'])) return '';
  $phone = preg_replace('/\D+/', '', (string)$wa['telefono']);
  $msg = (string)($wa['mensaje'] ?? '');
  return 'https://wa.me/' . $phone . '?text=' . urlencode($msg);
}

$slug = isset($_GET['slug']) ? trim((string)$_GET['slug']) : '';
$detail = null;

if ($slug !== '' && !empty($news)) {
  foreach ($news as $n) {
    if (($n['slug'] ?? '') === $slug) { $detail = $n; break; }
  }
}

/**
 * Categorías para filtros
 */
$cats = [];
foreach ($news as $n) {
  $c = trim((string)($n['categoria'] ?? 'Actualidad'));
  if ($c !== '' && !in_array($c, $cats, true)) $cats[] = $c;
}
sort($cats);

/**
 * Ordenar por fecha desc
 */
usort($news, function($a, $b) {
  $da = strtotime((string)($a['fecha'] ?? ''));
  $db = strtotime((string)($b['fecha'] ?? ''));
  return ($db <=> $da);
});
?>

<section class="pageHero pageHero--news">
  <div class="pageHero__bg" style="background-image:url('<?= e($base) ?>/assets/img/hero-bg.jpg')"></div>
  <div class="pageHero__overlay"></div>

  <div class="container pageHero__inner">
    <div class="newsHero">
      <div class="newsHero__panel reveal">
        <div class="kicker">Actualidad</div>
        <h1 class="pageHero__title">Noticias y Actualizaciones</h1>
        <p class="pageHero__lead">Comunicados, agenda pública y contenido reciente.</p>

        <div class="newsToolbar">
          <div class="newsFilters" role="tablist" aria-label="Filtrar por categoría">
            <button class="chip chip--btn is-active" type="button" data-filter="all">Todas</button>
            <?php foreach ($cats as $c): ?>
              <button class="chip chip--btn" type="button" data-filter="<?= e($c) ?>"><?= e($c) ?></button>
            <?php endforeach; ?>
          </div>

          <div class="newsSearch">
            <input class="newsSearch__input" id="newsSearch" type="search" placeholder="Buscar noticias..." autocomplete="off">
          </div>

          <div class="newsCTA">
            <a class="btn btn--primary" href="<?= e($base) ?>/contacto">Invítame a tu evento</a>
          </div>
        </div>

        <div class="chips" style="margin-top:12px;">
          <span class="chip">Comunidad</span>
          <span class="chip">Gestión</span>
          <span class="chip">Agenda</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section newsSection">
  <div class="container">
    <div class="grid2">

      <!-- IZQUIERDA -->
      <article class="card card--pad newsCard">

        <?php if ($detail): ?>
          <?php
            $cover = safe_url($base, $detail['cover'] ?? '');
            $wa = wa_link($detail['whatsapp'] ?? null);
            $pdf = $detail['pdf'] ?? null;
            $gallery = $detail['galeria'] ?? [];
            $tags = $detail['tags'] ?? [];
          ?>

          <div class="newsDetail">
            <div class="newsDetail__top">
              <a class="btn btn--ghost" href="<?= e($base) ?>/noticias">← Volver</a>
              <div class="newsDetail__meta">
                <span class="post__tag"><?= e($detail['categoria'] ?? 'Actualidad') ?></span>
                <span class="post__meta">
                  <?= e($detail['lugar'] ?? 'Envigado') ?> · <?= e(format_date_es($detail['fecha'] ?? '')) ?>
                </span>
              </div>
            </div>

            <h2 class="h2" style="margin-top:12px;"><?= e($detail['titulo'] ?? '') ?></h2>
            <p class="muted" style="margin-top:6px;"><?= e($detail['resumen'] ?? '') ?></p>

            <?php if ($cover): ?>
              <div class="newsDetail__cover" style="background-image:url('<?= e($cover) ?>')"></div>
            <?php endif; ?>

            <?php if (!empty($tags) && is_array($tags)): ?>
              <div class="newsDetail__tags">
                <?php foreach ($tags as $t): ?>
                  <span class="pill pill--soft"><?= e((string)$t) ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($detail['contenido']) && is_array($detail['contenido'])): ?>
              <div class="newsDetail__body">
                <?php foreach ($detail['contenido'] as $p): ?>
                  <p><?= e((string)$p) ?></p>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if (!empty($gallery) && is_array($gallery)): ?>
              <div class="newsGallery" aria-label="Galería">
                <?php foreach ($gallery as $img): ?>
                  <?php $u = safe_url($base, (string)$img); ?>
                  <?php if ($u): ?>
                    <a class="newsGallery__item" href="<?= e($u) ?>" target="_blank" rel="noopener" style="background-image:url('<?= e($u) ?>')"></a>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="newsDetail__actions">
              <?php if ($wa): ?>
                <a class="btn btn--primary" href="<?= e($wa) ?>" target="_blank" rel="noopener">Escríbeme por WhatsApp</a>
              <?php else: ?>
                <a class="btn btn--primary" href="<?= e($base) ?>/contacto">Contáctame</a>
              <?php endif; ?>

              <?php if (is_array($pdf) && !empty($pdf['url'])): ?>
                <a class="btn btn--ghost" href="<?= e(safe_url($base, (string)$pdf['url'])) ?>" target="_blank" rel="noopener">
                  <?= e((string)($pdf['titulo'] ?? 'Ver PDF')) ?>
                </a>
              <?php endif; ?>
            </div>
          </div>

        <?php else: ?>

          <div class="newsCard__head">
            <h2 class="h2">Publicaciones</h2>
            <p class="muted">Cargadas desde JSON (sin BD). Filtra y busca como un sitio grande.</p>
          </div>

          <?php
            // Destacada (si existe)
            $featured = null;
            foreach ($news as $n) { if (!empty($n['destacada'])) { $featured = $n; break; } }
          ?>

          <?php if ($featured): ?>
            <?php
              $fUrl = $base . '/noticias?slug=' . urlencode((string)($featured['slug'] ?? ''));
              $fCover = safe_url($base, $featured['cover'] ?? '');
              $fWa = wa_link($featured['whatsapp'] ?? null);
            ?>
            <div class="newsFeatured" data-cat="<?= e($featured['categoria'] ?? 'Actualidad') ?>"
                 data-search="<?= e(mb_strtolower(($featured['titulo'] ?? '') . ' ' . ($featured['resumen'] ?? ''), 'UTF-8')) ?>">
              <a class="newsFeatured__media" href="<?= e($fUrl) ?>" style="background-image:url('<?= e($fCover) ?>')"></a>
              <div class="newsFeatured__body">
                <div class="newsFeatured__meta">
                  <span class="post__tag"><?= e($featured['categoria'] ?? 'Actualidad') ?></span>
                  <span class="post__meta"><?= e($featured['lugar'] ?? 'Envigado') ?> · <?= e(format_date_es($featured['fecha'] ?? '')) ?></span>
                </div>
                <div class="newsFeatured__title"><?= e($featured['titulo'] ?? '') ?></div>
                <div class="newsFeatured__text"><?= e($featured['resumen'] ?? '') ?></div>
                <div class="newsFeatured__actions">
                  <a class="btn btn--primary" href="<?= e($fUrl) ?>">Ver noticia</a>
                  <?php if ($fWa): ?>
                    <a class="btn btn--ghost" href="<?= e($fWa) ?>" target="_blank" rel="noopener">WhatsApp</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php endif; ?>

          <div class="posts posts--pro" id="newsList">
            <?php foreach ($news as $n): ?>
              <?php
                $nSlug = (string)($n['slug'] ?? '');
                $url = $base . '/noticias?slug=' . urlencode($nSlug);
                $cat = (string)($n['categoria'] ?? 'Actualidad');
                $search = mb_strtolower((string)(($n['titulo'] ?? '') . ' ' . ($n['resumen'] ?? '') . ' ' . implode(' ', (array)($n['tags'] ?? []))), 'UTF-8');
                $cover = safe_url($base, $n['cover'] ?? '');
              ?>
              <a class="post post--pro" href="<?= e($url) ?>"
                 data-cat="<?= e($cat) ?>"
                 data-search="<?= e($search) ?>">
                <div class="post__left">
                  <div class="post__thumb" style="background-image:url('<?= e($cover) ?>')"></div>
                </div>
                <div class="post__right">
                  <div class="post__top">
                    <span class="post__tag"><?= e($cat) ?></span>
                    <span class="post__meta"><?= e($n['lugar'] ?? 'Envigado') ?> · <?= e(format_date_es($n['fecha'] ?? '')) ?></span>
                  </div>
                  <div class="post__title"><?= e($n['titulo'] ?? '') ?></div>
                  <div class="post__text"><?= e($n['resumen'] ?? '') ?></div>
                </div>
              </a>
            <?php endforeach; ?>
          </div>

          <div class="notice" style="margin-top:14px;">
            <strong>Tip:</strong> Para publicar, solo edita <code style="font-weight:700;">cache/noticias.json</code>.
          </div>

        <?php endif; ?>

      </article>

      <!-- DERECHA: INSTAGRAM -->
      <aside class="card card--pad igCard">
        <div class="igCard__head">
          <h2 class="h2">Instagram</h2>
          <p class="muted">Últimas publicaciones (con caché para evitar límites).</p>
        </div>

        <?php if (!empty($ig['error'])): ?>
          <div class="notice"><?= e($ig['error']) ?></div>
        <?php endif; ?>

        <div class="igGrid igGrid--pro">
          <?php foreach (($ig['data'] ?? []) as $p): ?>
            <a class="igItem igItem--pro" href="<?= e($p['permalink'] ?? '#') ?>" target="_blank" rel="noopener">
              <div class="igItem__thumb" style="background-image:url('<?= e($p['media_url'] ?? '') ?>')"></div>
              <div class="igItem__overlay"><span>Ver</span></div>
            </a>
          <?php endforeach; ?>

          <?php if (empty($ig['data'])): ?>
            <div class="muted">Aún no está conectado el token de Instagram. (Queda listo para activarlo)</div>
          <?php endif; ?>
        </div>

        <a class="btn btn--ghost" href="<?= e($config['social']['instagram']) ?>" target="_blank" rel="noopener">
          Ver Instagram
        </a>
      </aside>

    </div>
  </div>
</section>

<script>
(() => {
  const search = document.getElementById('newsSearch');
  const list = document.getElementById('newsList');
  const chips = document.querySelectorAll('.newsFilters [data-filter]');
  if (!list) return;

  let activeCat = 'all';

  function apply() {
    const q = (search?.value || '').trim().toLowerCase();
    const items = list.querySelectorAll('[data-cat][data-search]');
    items.forEach(el => {
      const cat = (el.getAttribute('data-cat') || '').toLowerCase();
      const hay = (el.getAttribute('data-search') || '').toLowerCase();

      const catOk = (activeCat === 'all') || (cat === activeCat.toLowerCase());
      const qOk = !q || hay.includes(q);

      el.style.display = (catOk && qOk) ? '' : 'none';
    });
  }

  chips.forEach(btn => {
    btn.addEventListener('click', () => {
      chips.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      activeCat = btn.getAttribute('data-filter') || 'all';
      apply();
    });
  });

  if (search) search.addEventListener('input', apply);
})();
</script>