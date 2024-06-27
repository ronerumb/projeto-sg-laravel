<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {

            $fornecedorid = DB::table('fornecedors')->insertGetId([
                'nome'=>'Fornecedor Padrão',
                'site'=>'fdsdf.com',
                'uf'=>'PE',
                'email'=>'dfsf@gmail.com'
            ]);
            $table->unsignedBigInteger('fornecedor_id')->default($fornecedorid)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
        $table->dropForeign('produtos_fornecedor_id_foreign');
        $table->dropColumn('fornecedor_id');
        });
    }
}
