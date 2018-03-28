DB::select('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->from('services')->join('cod_services', function($join) {$join->on('services.cod_service_id', '=', 'cod_services.id');})->where('services.requirer', '=', 'nailson')->get();

DB::table('services', 'cod_services')->pluck('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->join('cod_services', 'cod_service_id', '=', 'cod_services.id')->select('services.*', 'cod_services.description')->get();

DB::table('services')->join('cod_services', function ($join) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.requirer', '=', 'teste');})->select('cod_services.cod as codigo','cod_services.description as descricao','services.id','services.active','services.requirer')->get();

DB::table('services')->join('cod_services', function ($join) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.service_order_id', '=', 81);})->select('cod_services.cod as cod_service','cod_services.description as description','services.*')->get();

-- A query utilizada foi a seguinte:
DB::table('services')->join('cod_services', function ($join) use($serviceOrder) { $join->on('services.cod_service_id', '=', 'cod_services.id')->where('services.service_order_id', '=', $serviceOrder->id);})->select('cod_services.cod as cod_service','cod_services.description as description','services.*')->get();

DICAS SQL
Tabela countries

id countryName
1  Brasil
2  EUA
3  Japão

Tabela states

id countryId stateName
1  1         São Paulo
2  1         Rio Grande do Sul
3  1         Minas Gerais
4  2         California
5  2         Pensilvania
6  0         Corunha


-- Inner Join mostra dados com o valor da chave em ambas as tabelas.
SELECT * FROM `countries`
INNER JOIN states
ON countries.id = states.countryId

RESULTADO
id countryName id countryId stateName
1  Brasil      1  1         São Paulo
1  Brasil      2  1         Rio Grande do Sul
1  Brasil      3  1         Minas Gerais
2  EUA         4  2         California
2  EUA         5  2         Pensilvania

-- Left Join vai mostrar tudo da tabela da esquerda e só os correspondentes da direita
SELECT * FROM `countries`
LEFT JOIN states
ON countries.id = states.countryId

RESULTADO
id countryName id   countryId stateName
1  Brasil      1    1         São Paulo
1  Brasil      2    1         Rio Grande do Sul
1  Brasil      3    1         Minas Gerais
2  EUA         4    2         California
2  EUA         5    2         Pensilvania
3  Japão       null null      null
-- Corunha não foi retornado

-- Right Join vai mostrar tudo da tabela da direita e só os correspondentes da esquerda
SELECT * FROM `countries`
RIGHT JOIN states
ON countries.id = states.countryId

RESULTADO
id    countryName id   countryId stateName
1     Brasil      1    1         São Paulo
1     Brasil      2    1         Rio Grande do Sul
1     Brasil      3    1         Minas Gerais
2     EUA         4    2         California
2     EUA         5    2         Pensilvania
null  null        6    0         Corunha
-- Japão não foi retornado

-- Query para relacionar uma OS com os serviços alocados à mesma.
-- Ao selecionar uma OS, a combo de "Serviço" vai apresentar apenas os itens relacionados.
-- O id passado no Where é o id da OS.
-- Os dois últimos campos são concatenados para aparecerem no mesmo valor do combo.
SELECT services.cod_service_id, CONCAT(cod_services.cod, " - ", cod_services.description) as description FROM services
LEFT JOIN cod_services on services.cod_service_id = cod_services.id
WHERE services.service_order_id = 104;

-- Query montada pelo site www.midnightcowboycoder.com
-- Não funciona na minha versão do Laravel (5.1)
DB::select('services.cod_service_id','cod_services.cod','cod_services.description')->from('services')->join('cod_services', function($join) {$join->on('services.cod_service_id', '=', 'cod_services.id');})->where('services.service_order_id', '=', 104)->get();

-- Query adaptada do site e funcionando
DB::table('services')->join('cod_services', function($join) { $join->on('services.cod_service_id', '=', 'cod_services.id');})->where('services.service_order_id', '=', 105)->select('services.cod_service_id', 'cod_services.cod', 'cod_services.description')->get();

-- Query adaptada com passagem de parâmetro e concatenando os dois campos
-- cod_services.cod " - " cod_services.description
DB::table('services')->join('cod_services', function($join) use($serviceOrder) { $join->on('services.cod_service_id', '=', 'cod_services.id');})->where('services.service_order_id', '=', $serviceOrder->id)->select('services.cod_service_id', DB::raw('CONCAT(cod_services.cod, " - ", cod_services.description) as description'))->get();

