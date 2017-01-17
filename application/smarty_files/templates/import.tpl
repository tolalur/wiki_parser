{* Smarty *}


    <div class="row">

        <div class="col-md-12">
          <div class="col-md-6 border">
          <p>Импорт завершен.</p>
          <p>
            {if !$data['data_from_base']['db_false']}
                Найдена статья по адресу: <a href="{$data.link}" target="_blank">{$data.title}</a><br>
                Время обработки: {$data.time_for_import} сек.<br>
                Размер статьи: {$data.size} Кб<br>
                Кол-во слов: {$data.wordcount}
                {else}
                    {$data['data_from_base']['db_message']}
            {/if}
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
                {nocache}
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
                {/nocache}
              </tbody>
            </table>
        </div>

    </div>


