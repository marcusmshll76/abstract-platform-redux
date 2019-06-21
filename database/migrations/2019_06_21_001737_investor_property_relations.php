<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InvestorPropertyRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Track investor <-> microsite relationships
        Schema::create( 'microsite_sponsors', function( Blueprint $table ) {
            $table->bigIncrements('id');
            $table->integer('sponsorid');
            $table->integer('siteid');
        } );

        // Track investor <-> property relationship
        Schema::create( 'investments', function( Blueprint $table ) {
            $table->bigIncrements('id');
            $table->integer('userid');
            $table->integer('propertyid');
            $table->string('entity_name');
            $table->float('share');
        } );

        // Add invite code functionality for investors
        Schema::table( 'users', function( Blueprint $table) {
            $table->string('invite_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop( 'microsite_sponsors' );
        Schema::drop( 'investments' );
        Schema::table( 'users', function( Blueprint $table ) {
            $table->dropColumn('invite_code');
        });
    }
}
