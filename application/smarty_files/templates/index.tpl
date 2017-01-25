{include file="header.tpl"}
{* Smarty *}

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs">
              <li class="active">
                <a href="{$home}">Импорт Статей</a>
              </li>
              <li>
                <a href="search">Поиск</a>
              </li>             
            </ul>
        </div>
        <div class="col-md-12">
            <form class="form-inline" >
              <div class="form-group">
                <input type="text" class="form-control" id="inputWord" data-toggle="tooltip" data-trigger="manual" title="Пустой запрос" placeholder="Ключевое слово">
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
                {if !$data['data_from_base']['db_false']}
                    {foreach from=$data['data_from_base'] item=value}
                        <tr>
                          <td>{$value['title']}</td>
                          <td><a href="{$value['link']}" target="_blank">{$value['link']}</a></td>
                          <td>{$value['size']}</td>
                          <td>{$value['wordcount']}</td>
                        </tr>
                    {/foreach}
                {/if}
              </tbody>
            </table>
        </div>

    </div>
</div>

{include file="footer.tpl"}
