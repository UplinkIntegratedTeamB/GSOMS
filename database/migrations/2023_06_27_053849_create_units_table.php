<?php

use App\Models\Unit;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('unit_code');
            $table->string('description');
            $table->timestamps();
        });

        Unit::insert([
            ['unit_code' => '055', 'description' => 'AMP'],
            ['unit_code' => '069', 'description' => 'BAG/S'],
            ['unit_code' => '106', 'description' => 'BAR/S'],
            ['unit_code' => '108', 'description' => 'BASTA'],
            ['unit_code' => '068', 'description' => 'BDFT'],
            ['unit_code' => '098', 'description' => 'BKLT'],
            ['unit_code' => '062', 'description' => 'BOOK'],
            ['unit_code' => '024', 'description' => 'BOX/ES'],
            ['unit_code' => '025', 'description' => 'BTL/S'],
            ['unit_code' => '064', 'description' => 'BUNDLE/S'],
            ['unit_code' => '090', 'description' => 'CAL'],
            ['unit_code' => '047', 'description' => 'CAN/S'],
            ['unit_code' => '054', 'description' => 'CART'],
            ['unit_code' => '110', 'description' => 'CASE'],
            ['unit_code' => '114', 'description' => 'Cavan'],
            ['unit_code' => '097', 'description' => 'CONT'],
            ['unit_code' => '084', 'description' => 'COPIES'],
            ['unit_code' => '053', 'description' => 'C.U.M'],
            ['unit_code' => '026', 'description' => 'CUBIC/S'],
            ['unit_code' => '099', 'description' => 'CUP/S'],
            ['unit_code' => '071', 'description' => 'D/T'],
            ['unit_code' => '103', 'description' => 'day'],
            ['unit_code' => '104', 'description' => 'day/s'],
            ['unit_code' => '081', 'description' => 'DOZEN'],
            ['unit_code' => '094', 'description' => 'DRUM/S'],
            ['unit_code' => '070', 'description' => 'ELF'],
            ['unit_code' => '027', 'description' => 'FEET/S'],
            ['unit_code' => '028', 'description' => 'FOOT/S'],
            ['unit_code' => '029', 'description' => 'GAL/S'],
            ['unit_code' => '030', 'description' => 'GRAM/S'],
            ['unit_code' => '119', 'description' => 'HEAD/S'],
            ['unit_code' => '111', 'description' => 'HOURS'],
            ['unit_code' => '095', 'description' => 'KEG'],
            ['unit_code' => '032', 'description' => 'KG/S'],
            ['unit_code' => '063', 'description' => 'KITS'],
            ['unit_code' => '033', 'description' => 'KL/S'],
            ['unit_code' => '135', 'description' => 'LICENSE'],
            ['unit_code' => '073', 'description' => 'LOT'],
            ['unit_code' => '034', 'description' => 'LOT/S'],
            ['unit_code' => '035', 'description' => 'LRT/S'],
            ['unit_code' => '109', 'description' => 'LUMP SUM'],
            ['unit_code' => '036', 'description' => 'ML/S'],
            ['unit_code' => '131', 'description' => 'MOS'],
            ['unit_code' => '096', 'description' => 'MTH/S'],
            ['unit_code' => '037', 'description' => 'MRT/S'],
            ['unit_code' => '037', 'description' => 'MRT/S'],
            ['unit_code' => '058', 'description' => 'NEBULE'],
            ['unit_code' => '117', 'description' => 'NIGHT/S'],
            ['unit_code' => '120', 'description' => 'NODES'],
            ['unit_code' => '038', 'description' => 'OUNCE/S'],
            ['unit_code' => '050', 'description' => 'PACK/S'],
            ['unit_code' => '052', 'description' => 'PAD/S'],
            ['unit_code' => '116', 'description' => 'PAGE'],
            ['unit_code' => '115', 'description' => 'PAGE/S'],
            ['unit_code' => '080', 'description' => 'PAIL'],
            ['unit_code' => '075', 'description' => 'PAIR/S'],
            ['unit_code' => '061', 'description' => 'PATCH'],
            ['unit_code' => '085', 'description' => 'PAX'],
            ['unit_code' => '039', 'description' => 'PC/S'],
            ['unit_code' => '078', 'description' => 'PINT'],
            ['unit_code' => '082', 'description' => 'PKG/S'],
            ['unit_code' => '134', 'description' => 'POUCH/S'],
            ['unit_code' => '040', 'description' => 'POUND/S'],
            ['unit_code' => '060', 'description' => 'PUMP'],
            ['unit_code' => '077', 'description' => 'QUART'],
            ['unit_code' => '048', 'description' => 'REAM/S'],
            ['unit_code' => '133', 'description' => 'REFILL'],
            ['unit_code' => '041', 'description' => 'ROD/S'],
            ['unit_code' => '046', 'description' => 'ROLL/S'],
            ['unit_code' => '092', 'description' => 'ROUND/S'],
            ['unit_code' => '128', 'description' => 'SACHET'],
            ['unit_code' => '042', 'description' => 'SACK/S'],
            ['unit_code' => '043', 'description' => 'SET/S'],
            ['unit_code' => '093', 'description' => 'SHEET/S'],
            ['unit_code' => '065', 'description' => 'SPOOLS'],
            ['unit_code' => '130', 'description' => 'SQUARE FEET'],
            ['unit_code' => '072', 'description' => 'SQUARE METER'],
            ['unit_code' => '083', 'description' => 'STAND/S'],
            ['unit_code' => '076', 'description' => 'STRIP'],
            ['unit_code' => '107', 'description' => 'SUM'],
            ['unit_code' => '059', 'description' => 'SUPP'],
            ['unit_code' => '057', 'description' => 'TABLET'],
            ['unit_code' => '112', 'description' => 'TANK'],
            ['unit_code' => '079', 'description' => 'TIN'],
            ['unit_code' => '089', 'description' => 'TRAY/S'],
            ['unit_code' => '127', 'description' => 'TRIPS'],
            ['unit_code' => '101', 'description' => 'TRUCKLOAD PER TRIP'],
            ['unit_code' => '051', 'description' => 'TUBE/S'],
            ['unit_code' => '074', 'description' => 'UNIT'],
            ['unit_code' => '044', 'description' => 'UNIT/S'],
            ['unit_code' => '118', 'description' => 'VASES'],
            ['unit_code' => '056', 'description' => 'VIAL'],
            ['unit_code' => '045', 'description' => 'YARD/S'],
            ['unit_code' => '001', 'description' => 'PC/S'],
            ['unit_code' => '002', 'description' => 'UNIT/S'],
            ['unit_code' => '004', 'description' => 'LOT/S'],
            ['unit_code' => '005', 'description' => 'YARD/S'],
            ['unit_code' => '007', 'description' => 'MTR/S'],
            ['unit_code' => '008', 'description' => 'SACK/S'],
            ['unit_code' => '009', 'description' => 'INCH/ES'],
            ['unit_code' => '010', 'description' => 'FEET/S'],
            ['unit_code' => '011', 'description' => 'ROD/S'],
            ['unit_code' => '012', 'description' => 'FOOT/S'],
            ['unit_code' => '013', 'description' => 'CUBIC/S'],
            ['unit_code' => '014', 'description' => 'GAL/S'],
            ['unit_code' => '015', 'description' => 'OUNCE/S'],
            ['unit_code' => '016', 'description' => 'POUND/S'],
            ['unit_code' => '017', 'description' => 'GRAM/S'],
            ['unit_code' => '018', 'description' => 'KL/S'],
            ['unit_code' => '019', 'description' => 'KG/S'],
            ['unit_code' => '020', 'description' => 'ML/S'],
            ['unit_code' => '021', 'description' => 'BOX/ES'],
            ['unit_code' => '022', 'description' => 'SET/S'],
            ['unit_code' => '023', 'description' => 'BTL/S'],
            ['unit_code' => '067', 'description' => 'PAIR/S'],
            ['unit_code' => '086', 'description' => 'ROOL/S'],
            ['unit_code' => '091', 'description' => 'CAL'],
            ['unit_code' => '100', 'description' => 'JEEPLOAD'],
            ['unit_code' => '105', 'description' => 'DUMPTRUCK'],
            ['unit_code' => '113', 'description' => 'S.Q.M'],
            ['unit_code' => '121', 'description' => 'NODES'],
            ['unit_code' => '122', 'description' => 'PACK/S'],
            ['unit_code' => '123', 'description' => 'QRT'],
            ['unit_code' => '124', 'description' => 'TANK/S'],
            ['unit_code' => '125', 'description' => 'HEAD/S'],
            ['unit_code' => '126', 'description' => 'PACKAGE'],
            ['unit_code' => '129', 'description' => 'LICENSE'],
            ['unit_code' => '132', 'description' => 'BUNDLE'],
            ['unit_code' => '136', 'description' => 'SHEETS'],
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('units');
    }
};
