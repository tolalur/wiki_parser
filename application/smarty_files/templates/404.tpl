{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}
{* Smarty *}

<div class="container">
    <div class="row">
        <div class="col-md-12">
         <ul class="nav nav-tabs">
              <li>
                <a href="import">Импорт Статей</a>
              </li>
              <li>
                <a href="search">Поиск</a>
              </li>             
            </ul>
         <p>
          <h1>Ошибка 404</h1>
          Страница не существует или была удалена.
         </p>
        </div>
       

    </div>
</div>
{include file="footer.tpl"}
