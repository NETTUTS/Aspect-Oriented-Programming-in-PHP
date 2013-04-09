<?php

use Go\Aop\Aspect;
use Go\Aop\Intercept\FieldAccess;
use Go\Aop\Intercept\MethodInvocation;
use Go\Lang\Annotation\After;
use Go\Lang\Annotation\Before;
use Go\Lang\Annotation\Around;
use Go\Lang\Annotation\Pointcut;
use Go\Lang\Annotation\DeclareParents;
Use Go\Lang\Annotation\AfterThrowing;

class BrokerAspect implements Aspect {

	/**
	 * @param MethodInvocation $invocation Invocation
	 * @Before("execution(public Broker->*(*))")
	 */
	public function beforeMethodExecution(MethodInvocation $invocation) {
		echo "Entering method " . $invocation->getMethod()->getName() . "()\n";
		echo "with parameters: " . implode(', ', $invocation->getArguments()) . ".\n";
	}

	/**
	 * @param MethodInvocation $invocation Invocation
	 * @After("execution(public Broker->*(*))")
	 */
	public function afterMethodExecution(MethodInvocation $invocation) {
		echo "Finished executing method " . $invocation->getMethod()->getName() . "()\n\n";
	}

	/**
	 * @param MethodInvocation $invocation Invocation
	 * @Around("execution(public Broker->buy(*))")
	 */
	public function aroundMethodExecution(MethodInvocation $invocation) {
		$returned = $invocation->proceed();
		$broker = $invocation->getThis();

		if ($broker->getId() == 2) return $returned * 0.80;
		return $returned;
	}

	/**
	 * @param MethodInvocation $invocation Invocation
	 * @AfterThrowing("execution(public Broker->buy(*))")
	 */
	public function afterExceptionMethodExecution(MethodInvocation $invocation) {
		echo 'An exception has happened';
	}
}
