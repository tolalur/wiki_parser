{config_load file="test.conf" section="setup"}
{include file="header.tpl" title=foo}
{* Smarty *}

<div class="container">
    <div class="row">
        <div class="col-md-12">
         <p> Привет, {$http_request}! Добро пожаловать в Smarty!</p>
            <ul class="nav nav-tabs">
              <li>
                <a href="import">Импорт Статей</a>
              </li>
              <li class="active">
                <a href="search">Поиск</a>
              </li>             
            </ul>
        </div>
        <div class="col-md-12">
            <form class="form-inline">
              <div class="form-group">
                <label class="sr-only" for="inputWord">Поиск</label>
                <input type="text" class="form-control" id="inputWord" placeholder="">
              </div>
              <button type="submit" class="btn btn-primary">Поиск</button>
            </form>
        </div>
        
        <div class="col-md-12">
          <div class="col-md-12 delimiter"></div>
        </div>
        <div class="col-md-12">
          <div class="col-md-6">
            <p>
              <h3>Найдено 31 совпадение</h3>              
            </p>
            <p>
              <h3>Липецк <small>(22 вхождения)</small></h3>              
            </p>
             <p>
              <a href="#">Ссылка на статью</a><br>
              <a href="#">Ссылка на статью</a>              
            </p>
          </div>

          <div class="col-md-6 border">
            
          </div>
        </div>

    </div>
</div>
{include file="footer.tpl"}
