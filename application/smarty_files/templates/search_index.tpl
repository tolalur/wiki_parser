{include file="header.tpl"}
{* Smarty *}

<div class="container">
    <div class="row">
        <div class="col-md-12">
         
            <ul class="nav nav-tabs">
              <li>
                <a href="{$home}">Импорт Статей</a>
              </li>
              <li class="active">
                <a href="search">Поиск</a>
              </li>             
            </ul>
        </div>
        <div class="col-md-12">
             <form class="form-inline" >
               <div class="form-group">
                 <input type="text" class="form-control" id="inputWord" data-toggle="tooltip" data-trigger="manual" title="Пустой запрос">
               </div>
               <button type="button" class="btn btn-primary" id="send_request">Найти</button>
             </form>
        </div>
        <div class="col-md-12">
          <div class="col-md-12 delimiter"></div>
        </div>
    </div>
</div>
              
<div class="container" id = 'main_wrap'>
</div>
{include file="footer_search.tpl"}
