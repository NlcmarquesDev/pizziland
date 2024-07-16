<?php

declare(strict_types=1);

namespace PizzaApp\Bussiness;

use PizzaApp\Data\UsersDAO;
use PizzaApp\Data\OrdersDAO;
use PizzaApp\Data\PostcodeDAO;

class CheckoutServices
{

    protected $dbUser;
    protected $dbPostcode;
    protected $dbOrder;

    public $promoSection = false;

    public function __construct()
    {
        $this->dbUser = new UsersDAO();
        $this->dbPostcode = new PostcodeDAO();
        $this->dbOrder = new OrdersDAO();
    }

    public function allInfoPostcode($id)
    {
        return $this->dbPostcode->getPostcodeByID($id);
    }
    public function createPromoCodes()
    {
        if ($_SESSION['total_cart'] > 50 && $_SESSION['total_cart'] < 100) {
            $this->promoSection = true;
            return 'delicius20';
        } else if ($_SESSION['total_cart'] > 100) {
            $this->promoSection = true;
            return 'yummy30';
        }
    }
    public function promoCodeFirstOrder($user_id)
    {
        if (!$this->dbOrder->getOrdersByUserID($user_id)) {
            $this->promoSection = true;
            return 'first10';
        }
    }
    public function discountCode($promoCode)
    {
        switch ($promoCode) {
            case '10':
                $total = $_SESSION['total_cart'] * 0.90;
                break;
            case '15':
                $total = $_SESSION['total_cart'] * 0.85;
                break;
            case '20':
                $total = $_SESSION['total_cart'] * 0.80;
                break;
            case '30':
                $total = $_SESSION['total_cart'] * 0.70;
                break;
        }
        return $total;
    }
}
