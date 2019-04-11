<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        // $this->artisan('migrate:refresh');
        $this->artisan('db:seed', ['--class' => 'TestDataSeeder']);
    }

    /**
     * @test
     */
    public function api_customersにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/customers');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customersにGETメソッドでアクセスするとJSONが返却される()
    {
        $response = $this->get('api/customers');
        $response->assertJson([]);
    }

    /**
     * @test
     */
    public function api_customersにGETメソッドで取得できる顧客情報のJSON形式は要検通りである()
    {
        $response = $this->get('api/customers');
        $customers = $response->json();
        $customer = $customers[0];
        $this->assertSame(['id', 'name'], array_keys($customer));
    }

    /**
     * @test
     */
    public function api_customersにGETメソッドで返却される顧客情報は2件である()
    {
        $response = $this->get('api/customers');
        $response->assertJsonCount(2);
    }

    /**
     * @test
     */
    public function api_customersにPOSTメソッドでアクセスできる()
    {
        $customer = [
            'name' => 'customer_name'
        ];

        // 実行部分を書く
        $response = $this->postJson('api/customers', $customer);
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customersにnameが含まれない場合は422UnprocessableEntityが返却される()
    {
        $params = [];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function api_customersのnameが空の場合は422UnprocessableEntityが返却される()
    {
        $params = ['name' => ''];
        $response = $this->postJson('api/customers', $params);
        $response->assertStatus(\Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    /**
     * @test
     */
    public function api_customersに顧客名をPOSTするとcustomersテーブルにそのデータが追加される()
    {
        $params = [
            'name' => '顧客名',
        ];
        $this->postJson('api/customers', $params);

        $this->assertDatabaseHas('customers', $params);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにPUTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->put('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_customers_customer_idにdeleteメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->delete('api/customers/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reportsにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/reports');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reportsにPOSTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->post('api/reports');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにGETメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->get('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにPUTメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->put('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function api_reports_report_idにDELETEメソッドでアクセスできる()
    {
        // 実行部分を書く
        $response = $this->delete('api/reports/1');
        // 先に検証部分を記述
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function POST_api_customersのエラーレスポンスの確認()
    {
        $params = ['name' => ''];
        $response = $this->postJson('api/customers', $params);
        $error_response = [
            'message' => 'The given data was invalid.',
            'errors' => [
                'name' => [
                    'nameは必須項目です'
                ],
            ]
        ];
        $response->assertExactJson($error_response);
    }
}
