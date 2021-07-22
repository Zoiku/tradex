<?php 

     /**
    *@author Mark Zoiku
    */

    // Listing V3 extends the parent class Listing to create an object with an updated html property that has a delete button for users to click and delete objects from a database.
    // Also, a get method is used to send the symbol of the object to the user to eventually delete it from the database
    class ListingV3{
        public $symbol;
        public $company;
        public $industry;
        public $totalCapital;
        public $email;
        public $totalShares;
        public $currentPrice;
        public $html;

        public function __construct($symbol, $company, $industry, $totalCapital, $email, $totalShares, $currentPrice){
            $this->symbol = $symbol;
            $this->company = $company;
            $this->industry = $industry;
            $this->totalCapital = $totalCapital;
            $this->email = $email;
            $this->totalShares = $totalShares;
            $this->currentPrice = $currentPrice;
            $this->html = <<<EOT
                <tr>
                    <td>{$symbol}</td>
                    <td>{$company}</td>
                    <td>{$industry}</td>
                    <td>{$totalCapital}</td>
                    <td><a href='mailto:{$email}'>{$email}</a></td>
                    <td>{$totalShares}</td>
                    <td>{$currentPrice}</td>
                    <td><a class="delete-stock" href="stockindex.php?symbol_to_delete={$symbol}"><img class="action-button" src="./Assets/delete_button.png" alt="img"></a></td>
                </tr>
            EOT;
        }

        public function printhtml(){
            echo "{$this->html}";
        }
        
        // Since this class would be used for records being read from a database, the static method 'empty', is used to return an empty row if there're no records for a particular user.
        public static function empty(){
            echo "
                <tr>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                    <td>--</td>
                </tr>
                ";
        }   
    }
?>