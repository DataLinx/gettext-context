<?php

use PHPUnit\Framework\TestCase;

class Test extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        bindtextdomain('messages', './locales');
        textdomain('messages');
        setlocale(LC_ALL,'sl_SI.UTF-8');
    }

    public function test_pgettext()
    {
        // Test translated
        $this->assertEquals('Ime', pgettext('User', 'Name'));
        $this->assertEquals('Naziv', pgettext('Product', 'Name'));

        // Test non-translated
        $this->assertEquals('Name', pgettext('Country', 'Name'));
    }

    public function test_npgettext()
    {
        // Test translated
        $this->assertEquals('1 ime', sprintf(npgettext('User', '%d name', '%d names', 1), 1));
        $this->assertEquals('2 imeni', sprintf(npgettext('User', '%d name', '%d names', 2), 2));
        $this->assertEquals('3 imena', sprintf(npgettext('User', '%d name', '%d names', 3), 3));
        $this->assertEquals('5 imen', sprintf(npgettext('User', '%d name', '%d names', 5), 5));
        $this->assertEquals('101 ime', sprintf(npgettext('User', '%d name', '%d names', 101), 101));

        $this->assertEquals('1 naziv', sprintf(npgettext('Product', '%d name', '%d names', 1), 1));

        // Test non-translated
        $this->assertEquals('1 name', sprintf(npgettext('Country', '%d name', '%d names', 1), 1));
    }

    public function test_dpgettext()
    {
        // Switch to a different domain
        textdomain('something');

        // Make sure we are not using the correct domain
        $this->assertEquals('Name', pgettext('User', 'Name'));

        // Test translated
        $this->assertEquals('Ime', dpgettext('messages', 'User', 'Name'));

        // Test non-translated
        $this->assertEquals('Name', dpgettext('messages', 'Country', 'Name'));
    }

    public function test_dnpgettext()
    {
        // Switch to a different domain
        textdomain('something');
        $this->assertEquals('something', textdomain(NULL));

        // Make sure we are not using the correct domain
        $this->assertEquals('Name', pgettext('User', 'Name'));

        // Test translated
        $this->assertEquals('1 ime', sprintf(dnpgettext('messages', 'User', '%d name', '%d names', 1), 1));
        $this->assertEquals('2 imeni', sprintf(dnpgettext('messages', 'User', '%d name', '%d names', 2), 2));
        $this->assertEquals('3 imena', sprintf(dnpgettext('messages', 'User', '%d name', '%d names', 3), 3));
        $this->assertEquals('5 imen', sprintf(dnpgettext('messages', 'User', '%d name', '%d names', 5), 5));
        $this->assertEquals('101 ime', sprintf(dnpgettext('messages', 'User', '%d name', '%d names', 101), 101));

        $this->assertEquals('1 naziv', sprintf(dnpgettext('messages', 'Product', '%d name', '%d names', 1), 1));

        // Test non-translated
        $this->assertEquals('1 name', sprintf(dnpgettext('messages', 'Country', '%d name', '%d names', 1), 1));

        // Assert we haven't switched the domain
        $this->assertEquals('something', textdomain(NULL));
    }
}