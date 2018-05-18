<?php

namespace App\Controllers;

use \Core\View;

/**
 * PageController
 *
 * PHP version 7.0
 */
class PageController extends \Core\Controller
{
    /**
     * Before filter. Return false to stop the action from executing.
     *
     * @return void
     */
    protected function before()
    {
    }

    public function aboutUsAction()
    {
        View::renderTemplate('Page/home.html');
    }

    public function contactAction()
    {
        View::renderTemplate('Page/contact.html');
    }

    public function fairAppAction()
    {
        View::renderTemplate('Page/fairApp.html');
    }

    public function fairBoxAction()
    {
        View::renderTemplate('Page/fairBox.html');
    }

    public function fairDataAction()
    {
        View::renderTemplate('Page/fairData.html');
    }

    public function fairGogglesAction()
    {
        View::renderTemplate('Page/fairGoggles.html');
    }

    public function fairPayPlanAction()
    {
        View::renderTemplate('Page/fairPayPlan.html');
    }

    public function fairRentAction()
    {
        View::renderTemplate('Page/fairRent.html');
    }

    public function fairVestAction()
    {
        View::renderTemplate('Page/fairVest.html');
    }

    public function faqAction()
    {
        View::renderTemplate('Page/faq.html');
    }

    public function howItWorksAction()
    {
        View::renderTemplate('Page/howItWorks.html');
    }

    public function orderAndDeliveryAction()
    {
        View::renderTemplate('Page/orderAndDelivery.html');
    }

    public function paymentsAction()
    {
        View::renderTemplate('Page/payments.html');
    }

    public function sitemapAction()
    {
        View::renderTemplate('Page/sitemap.html');
    }

    public function techSupportAction()
    {
        View::renderTemplate('Page/techSupport.html');
    }

    public function termsAction()
    {
        View::renderTemplate('Page/terms.html');
    }
}
