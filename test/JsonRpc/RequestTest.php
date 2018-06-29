<?php
/**
 * @author Michał Żaloudik <ponury.kostek@gmail.com>
 */

namespace JsonRpc\Test;

use PHPUnit\Framework\TestCase;
use JsonRpc\Request;

class RequestTest extends TestCase {
	public function testConstructor() {
		$this->assertInstanceOf(Request::class, new Request());
		$request = new Request([
			'resource' => 'Test',
			'method' => 'test',
			'params' => []
		]);
		$this->assertInstanceOf(Request::class, $request);
		$this->assertEquals('{"version":"1.2.0","id":2,"resource":"Test","method":"test","params":[]}', $request->toString());
	}

	public function testToStringThrowOnMissingProps() {
		$this->expectException(\Error::class);
		(new Request())->toString();
	}
}
