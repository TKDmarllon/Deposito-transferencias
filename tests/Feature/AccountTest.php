<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Str;


class AccountTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function test_creat()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>Str::random(10),
	        "cnpj"=>"4839284402",
            'class'=>'pj',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(200);
    }

    public function test_index()
    {
        $response = $this->get(route('conta.home'),[
        ]);

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $response = $this->get(route('conta.show',1),[
        ]);

        $response->assertStatus(200);
    }

    public function test_del()
    {
        $response = $this->delete(route('conta.del',3),[
        ]);

        $response->assertStatus(200);
    }

    public function test_creatErrorName()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"",
	        "cnpj"=>"4839284402",
            'class'=>'pj',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorClass()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"nomealeatorio",
	        "cnpj"=>"4839284402",
            'class'=>'cpf',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorEmail()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"nomealeatorio",
	        "cnpj"=>"4839284402",
            'class'=>'cpf',
            "email"=>Str::random(8),
            "password"=>'12345678',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorPassword()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"nomealeatorio",
	        "cnpj"=>"4839284402",
            'class'=>'cpf',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'8dm4hd8f',
            "balance"=>3000
        ]);

        $response->assertStatus(400);
    }

    public function test_creatErrorBalance()
    {
        $response = $this->post(route('conta.cadastro'),[
            "fullname"=>"nomealeatorio",
	        "cnpj"=>"4839284402",
            'class'=>'cpf',
            "email"=>Str::random(8)."@gmail.com",
            "password"=>'12345678',
            "balance"=>""
        ]);

        $response->assertStatus(400);
    }
}