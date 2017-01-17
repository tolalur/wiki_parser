<?php
/* Smarty version 3.1.31, created on 2017-01-14 12:58:21
  from "C:\xampp\htdocs\wiki\application\smarty_files\templates\import.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_587a125dce11e0_51999206',
  'has_nocache_code' => true,
  'file_dependency' => 
  array (
    '2bf5ba3a61c746c8556f487e66ce03cdb6779c62' => 
    array (
      0 => 'C:\\xampp\\htdocs\\wiki\\application\\smarty_files\\templates\\import.tpl',
      1 => 1484351480,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587a125dce11e0_51999206 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '5345587a125dbeb025_97548712';
?>



    <div class="row">

        <div class="col-md-12">
          <div class="col-md-6 border">
          <p>Импорт завершен.</p>
          <p>
            <?php if (!$_smarty_tpl->tpl_vars['data']->value['data_from_base']['db_false']) {?>
                Найдена статья по адресу: <a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['link'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</a><br>
                Время обработки: <?php echo $_smarty_tpl->tpl_vars['data']->value['time_for_import'];?>
 сек.<br>
                Размер статьи: <?php echo $_smarty_tpl->tpl_vars['data']->value['size'];?>
 Кб<br>
                Кол-во слов: <?php echo $_smarty_tpl->tpl_vars['data']->value['wordcount'];?>

                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['data']->value['data_from_base']['db_message'];?>

            <?php }?>
          </p>
          </div>
        </div>

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
                
                    <?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php if (!$_smarty_tpl->tpl_vars[\'data\']->value[\'data_from_base\'][\'db_false\']) {?>/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>

                        <?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars[\'data\']->value[\'data_from_base\'], \'value\');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars[\'value\']->value) {
?>/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>

                        <tr>
                          <td><?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value[\'title\'];?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>
</td>
                          <td><a href="<?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value[\'link\'];?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>
" target="_blank"><?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value[\'link\'];?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>
</a></td>
                          <td><?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value[\'size\'];?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>
</td>
                          <td><?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php echo $_smarty_tpl->tpl_vars[\'value\']->value[\'wordcount\'];?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>
</td>
                        </tr>
                        <?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>
/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>

                    <?php echo '/*%%SmartyNocache:5345587a125dbeb025_97548712%%*/<?php }?>/*/%%SmartyNocache:5345587a125dbeb025_97548712%%*/';?>

                
              </tbody>
            </table>
        </div>

    </div>


<?php }
}
