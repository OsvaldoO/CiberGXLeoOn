<h2>Usuarios</h2>

<?php if(isset($result)) : ?>

<article>
    <?php for($i = 0; $i < count($result); $i++): ?>
    <section>
    <h3><strong><?php echo $result[$i]->nick; ?></strong></h3>
    <p><?php echo $result[$i]->nombre; ?></p>
    <i><h5><?php echo $result[$i]->email; ?></h5></i>
    <?php endfor;?>
    </section>
</article>

<?php else: ?>

<p><strong>No hay Noticias!</strong></p>

<?php endif; ?>
