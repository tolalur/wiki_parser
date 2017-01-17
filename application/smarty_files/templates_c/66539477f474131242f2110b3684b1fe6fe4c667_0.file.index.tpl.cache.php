<?php
/* Smarty version 3.1.31, created on 2017-01-14 12:57:18
  from "C:\xampp\htdocs\wiki\application\smarty_files\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_587a121e70a7c2_13433841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '66539477f474131242f2110b3684b1fe6fe4c667' => 
    array (
      0 => 'C:\\xampp\\htdocs\\wiki\\application\\smarty_files\\templates\\index.tpl',
      1 => 1484329968,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_587a121e70a7c2_13433841 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '7782587a121e4d40c0_28752212';
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="<?php echo $_smarty_tpl->tpl_vars['home']->value;?>
">Импорт Статей</a>
              </li>
              <li>
                <a href="search">Поиск</a>
              </li>             
            </ul>
        </div>
        <div class="col-md-12">
            <form class="form-inline" >
              <div class="form-group">
                <input type="text" class="form-control" id="inputWord" placeholder="Ключевое слово">
              </div>
              <button type="button" class="btn btn-primary" id="send_request">Скопировать</button>
            </form>
        </div>

    </div>
</div>

<div class="container" id = 'main_wrap'>
    <div class="row">

        <div class="col-md-12">
          <div class="col-md-12 delimiter"></div>
        </div>
        <div class="col-md-12">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Название статьи</th>
                  <th>Ссылка</th>
                  <th>Размер статьи кб</th>
                  <th>Кол-во слов</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!$_smarty_tpl->tpl_vars['data']->value['data_from_base']['db_false']) {?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['data']->value['data_from_base'], 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                        <tr>
                          <td><?php echo $_smarty_tpl->tpl_vars['value']->value['title'];?>
</td>
                          <td><a href="<?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['value']->value['link'];?>
</a></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['value']->value['size'];?>
</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['value']->value['wordcount'];?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

                <?php }?>
              </tbody>
            </table>
        </div>

    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
