
<main class="container">


<form action="busca" method="GET">
  
      <input type="text" name="busca" placaholder="Busca">
      <button class="btn  blue darken-2">PESQUISAR</button>
      <a href="/home" class="btn gray">REDEFINIR FILTROS </a>
 
</form>

<h4> LISTA DE PRODUTOS </h4>


<table class="highlight grey lighten-5">
        <thead>
          <tr>
              <th>Titulo</th>
              <th>Descrição</th>
              <th>Valor</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
        <?php foreach($produtos as $produto): ?>
          <tr>
            <td><?php echo $produto['titulo'] ?></td>
            <td><?php echo $produto['descricao'] ?></td>
            <td><?php echo "R$ ".number_format($produto['valor'],2,",",".") ?></td>
            <td>
                <a href="/produto/editar?id=<?php echo $produto['id'] ?>" class="btn orange"> Editar </a>
                <a href="/produto/excluir?id=<?php echo $produto['id'] ?>" class="btn red"> Excluir </a>
          </tr>
        <?php endforeach; ?>    
        </tbody>
      </table>


</ul>

<?php if(isset($editando)): ?>
<h3> EDITAR </h3>

<?php else: ?>
<h3> ADICIONAR </h3>

<?php endif; ?>

<?php if(isset($msg)):?>
<p><?php echo $msg ?></p>
<?php endif; ?>    
<div class="row">
<form class="col s12" action="<?php echo (isset($editando) ? '/produto/atualizar' : '/produto/adicionar'); ?>" method="post">

<?php if(isset($editando)): ?>
<input type="hidden" name="id" placeholder="ID"
    value="<?php echo $produtoEdit['id'];?>" >
<?php endif; ?>

<input type="text" name="titulo" placeholder="Titulo"
    value="<?php echo (isset($produtoEdit['titulo']) ? $produtoEdit['titulo']:'');?>" >
<input type="text" name="descricao" placeholder="Descricao"
value="<?php echo (isset($produtoEdit['descricao']) ? $produtoEdit['descricao']:'');?>">
<input type="text" name="valor" placeholder="Valor"
value="<?php echo (isset($produtoEdit['valor']) ? $produtoEdit['valor']:'');?>">
<button class="btn blue darken-2"><?php echo (isset($editando) ? 'SALVAR' : 'ADICIONAR'); ?></button>

<?php if(isset($editando)): ?>

    <a href="/home" class="btn red">CANCELAR</a>

<?php endif; ?>
</form>   
</div>

</main>
