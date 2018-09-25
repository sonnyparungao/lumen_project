<?php
class ClientTest extends TestCase
{

    /*
        If the unit testing doesn't work. Please open the route and comment out the
        middleware that I'm using. And lastly remove the Header Authorization here in the unit testing.

    */

    /**
     * /clients [GET]
     */
    public function testShouldReturnAllClients(){
        $this->get("clients", ["Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik56WTRPREkyUVVJNU5VSTNRa05ETWpaRlF6RTNOREUwTlRrd09UZEJSVVkzTVVGRE16RXhPUSJ9.eyJpc3MiOiJodHRwczovL3Nvbm55MTk4Ny5hdXRoMC5jb20vIiwic3ViIjoiVVRYUTV1eEYwMzYyMVdHMGp2RkllSzBrbW0xemVoUUJAY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImlhdCI6MTUzNzc1ODU3NSwiZXhwIjoxNTM3ODQ0OTc1LCJhenAiOiJVVFhRNXV4RjAzNjIxV0cwanZGSWVLMGttbTF6ZWhRQiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.gVBOw_tK1aBrQW880QAFCfEWcXMr4ADIdWBb8NtYEZ6gkE81WCBTsTUZak5PHVm3lFqPBTYJ8_ffTpRPwcetheumyFftBP3AAXAlssMWCgVgNMefCkAVx4pARgPGvNgwZXrSYl6e4CGuk_L-en6j7pqZTVHR0qvJiMsf0zqab3_IrTAT4eu_4pZGOqZwwVoF5XI2coAfnJjm5YC9lTqaM-nPhPLklSvXQvhM2vooi98cCMhgV2D18e7qaEMv8pUtpCO35NC7ewC975zcr8xS9YQ00xACk6wo2l-jwqnzBeRXiKGgdtmfiC4ODVHx_WarUp06W-MvMkN7Z05sWvS3zw"]);
        $this->seeStatusCode(200);
        $this->seeJsonStructure([
            'data' => ['*' =>
                [
                    'name',
                    'address',
                    'active',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ],
            'meta' => [
                '*' => [
                    'total',
                    'count',
                    'per_page',
                    'current_page',
                    'total_pages',
                    'links',
                ]
            ]
        ]);
        
    }

      /**
     * /clients/id [GET]
     */
    public function testShouldReturnClientUsingId(){
        $this->get("clients/1",  ["Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik56WTRPREkyUVVJNU5VSTNRa05ETWpaRlF6RTNOREUwTlRrd09UZEJSVVkzTVVGRE16RXhPUSJ9.eyJpc3MiOiJodHRwczovL3Nvbm55MTk4Ny5hdXRoMC5jb20vIiwic3ViIjoiVVRYUTV1eEYwMzYyMVdHMGp2RkllSzBrbW0xemVoUUJAY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImlhdCI6MTUzNzc1ODU3NSwiZXhwIjoxNTM3ODQ0OTc1LCJhenAiOiJVVFhRNXV4RjAzNjIxV0cwanZGSWVLMGttbTF6ZWhRQiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.gVBOw_tK1aBrQW880QAFCfEWcXMr4ADIdWBb8NtYEZ6gkE81WCBTsTUZak5PHVm3lFqPBTYJ8_ffTpRPwcetheumyFftBP3AAXAlssMWCgVgNMefCkAVx4pARgPGvNgwZXrSYl6e4CGuk_L-en6j7pqZTVHR0qvJiMsf0zqab3_IrTAT4eu_4pZGOqZwwVoF5XI2coAfnJjm5YC9lTqaM-nPhPLklSvXQvhM2vooi98cCMhgV2D18e7qaEMv8pUtpCO35NC7ewC975zcr8xS9YQ00xACk6wo2l-jwqnzBeRXiKGgdtmfiC4ODVHx_WarUp06W-MvMkN7Z05sWvS3zw"]);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'address',
                    'active',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }


      /**
     * /client [POST]
     */
    public function testShouldCreateClient(){
        $parameters = [
            'name' => 'XYZ Corp',
            'address' => 'Location XXXX'
        ];
        $this->post("clients", $parameters, ["Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik56WTRPREkyUVVJNU5VSTNRa05ETWpaRlF6RTNOREUwTlRrd09UZEJSVVkzTVVGRE16RXhPUSJ9.eyJpc3MiOiJodHRwczovL3Nvbm55MTk4Ny5hdXRoMC5jb20vIiwic3ViIjoiVVRYUTV1eEYwMzYyMVdHMGp2RkllSzBrbW0xemVoUUJAY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImlhdCI6MTUzNzc1ODU3NSwiZXhwIjoxNTM3ODQ0OTc1LCJhenAiOiJVVFhRNXV4RjAzNjIxV0cwanZGSWVLMGttbTF6ZWhRQiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.gVBOw_tK1aBrQW880QAFCfEWcXMr4ADIdWBb8NtYEZ6gkE81WCBTsTUZak5PHVm3lFqPBTYJ8_ffTpRPwcetheumyFftBP3AAXAlssMWCgVgNMefCkAVx4pARgPGvNgwZXrSYl6e4CGuk_L-en6j7pqZTVHR0qvJiMsf0zqab3_IrTAT4eu_4pZGOqZwwVoF5XI2coAfnJjm5YC9lTqaM-nPhPLklSvXQvhM2vooi98cCMhgV2D18e7qaEMv8pUtpCO35NC7ewC975zcr8xS9YQ00xACk6wo2l-jwqnzBeRXiKGgdtmfiC4ODVHx_WarUp06W-MvMkN7Z05sWvS3zw"]);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'address',
                    'active',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
        
    }


    /**
     * /clients/id [PUT]
     */
    public function testShouldUpdateClientInformation(){
        $parameters = [
            'name' => 'XYZ Corporation',
            'address' => 'Quezon City'
        ];
        $this->put("clients/1", $parameters, ["Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik56WTRPREkyUVVJNU5VSTNRa05ETWpaRlF6RTNOREUwTlRrd09UZEJSVVkzTVVGRE16RXhPUSJ9.eyJpc3MiOiJodHRwczovL3Nvbm55MTk4Ny5hdXRoMC5jb20vIiwic3ViIjoiVVRYUTV1eEYwMzYyMVdHMGp2RkllSzBrbW0xemVoUUJAY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImlhdCI6MTUzNzc1ODU3NSwiZXhwIjoxNTM3ODQ0OTc1LCJhenAiOiJVVFhRNXV4RjAzNjIxV0cwanZGSWVLMGttbTF6ZWhRQiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.gVBOw_tK1aBrQW880QAFCfEWcXMr4ADIdWBb8NtYEZ6gkE81WCBTsTUZak5PHVm3lFqPBTYJ8_ffTpRPwcetheumyFftBP3AAXAlssMWCgVgNMefCkAVx4pARgPGvNgwZXrSYl6e4CGuk_L-en6j7pqZTVHR0qvJiMsf0zqab3_IrTAT4eu_4pZGOqZwwVoF5XI2coAfnJjm5YC9lTqaM-nPhPLklSvXQvhM2vooi98cCMhgV2D18e7qaEMv8pUtpCO35NC7ewC975zcr8xS9YQ00xACk6wo2l-jwqnzBeRXiKGgdtmfiC4ODVHx_WarUp06W-MvMkN7Z05sWvS3zw"]);
        $this->seeStatusCode(200);
        $this->seeJsonStructure(
            ['data' =>
                [
                    'name',
                    'address',
                    'active',
                    'created_at',
                    'updated_at',
                    'links'
                ]
            ]    
        );
    }


     /**
     * /clients/id [DELETE]
     */
    public function testShouldDeleteClient(){
        
        $parameters = [
            'active' => 1
        ];

        $this->delete("clients/1", $parameters, ["Authorization" => "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImtpZCI6Ik56WTRPREkyUVVJNU5VSTNRa05ETWpaRlF6RTNOREUwTlRrd09UZEJSVVkzTVVGRE16RXhPUSJ9.eyJpc3MiOiJodHRwczovL3Nvbm55MTk4Ny5hdXRoMC5jb20vIiwic3ViIjoiVVRYUTV1eEYwMzYyMVdHMGp2RkllSzBrbW0xemVoUUJAY2xpZW50cyIsImF1ZCI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCIsImlhdCI6MTUzNzc1ODU3NSwiZXhwIjoxNTM3ODQ0OTc1LCJhenAiOiJVVFhRNXV4RjAzNjIxV0cwanZGSWVLMGttbTF6ZWhRQiIsImd0eSI6ImNsaWVudC1jcmVkZW50aWFscyJ9.gVBOw_tK1aBrQW880QAFCfEWcXMr4ADIdWBb8NtYEZ6gkE81WCBTsTUZak5PHVm3lFqPBTYJ8_ffTpRPwcetheumyFftBP3AAXAlssMWCgVgNMefCkAVx4pARgPGvNgwZXrSYl6e4CGuk_L-en6j7pqZTVHR0qvJiMsf0zqab3_IrTAT4eu_4pZGOqZwwVoF5XI2coAfnJjm5YC9lTqaM-nPhPLklSvXQvhM2vooi98cCMhgV2D18e7qaEMv8pUtpCO35NC7ewC975zcr8xS9YQ00xACk6wo2l-jwqnzBeRXiKGgdtmfiC4ODVHx_WarUp06W-MvMkN7Z05sWvS3zw"]);
        $this->seeStatusCode(410);
        $this->seeJsonStructure([
                'status',
                'message'
        ]);
    }

  
}