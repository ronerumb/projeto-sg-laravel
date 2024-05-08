<?php

use Illuminate\Database\Seeder;
use App\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contato = new SiteContato();
        $contato->nome = 'Teste01';
        $contato->telefone = '1515454';
        $contato->email = 'Teste01@teste01.com';
        $contato->motivo_contato = 1;
        $contato->mensagem = 'fjdsifsdjfsi sigjfdigj gijdgdgjidf';
        $contato->save();


    }
}
