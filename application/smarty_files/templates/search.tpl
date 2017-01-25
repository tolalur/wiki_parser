<div class="row">
    <div class="col-md-12">

        {if $data['db']}
            <div class="col-md-6">
                <p>
                  <h3>Найдено {$data['all_count']} совпадение.</h3>              
                </p>
                {if $data['search_status']}
                    <p id = 'result'>                        
                        {foreach from=$data['result'] item=value}
                            <a onclick="" href="javascript:void(0)">{$value['title']}</a> <small>({$value['count']} вхождения)</small><br>                           
                        {/foreach}
                    </p>                     
                {/if}
            </div>
            
            {if $data['search_status']}
                <div class="col-md-6 border" hidden="true">
                    {foreach from=$data['result'] item=value}
                        <p id = '{$value['title']}' hidden="true">
                            {$value['text']} 
                        </p>                     
                    {/foreach}        
                </div>
            {/if}
        {else}
                <p>
                  <h3>Сервер не отвечает, попробуйте позже.</h3>              
                </p>
        {/if}
        
    </div>
</div>
        

    

