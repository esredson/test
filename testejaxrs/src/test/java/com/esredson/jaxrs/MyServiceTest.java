package com.esredson.jaxrs;

import static org.junit.Assert.assertEquals;

import javax.ws.rs.client.Entity;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;

import org.junit.Test;

public class MyServiceTest extends MyTest {
	
	@Override
	protected String getPath() {
		return "my";
	}
	
	@Test
	public void producesTextPlainMustReturnHello() {
		String hello = request("textplain").request().get(String.class);
		assertEquals("Hello!", hello);
	}
	
	@Test
	public void producesJsonMustReturnEntity() {
		MyEntity e = request("json")
				.path("{alias}@{domain}.com")
				.resolveTemplate("alias", "valor1")
				.resolveTemplate("domain", "valor2")
				.request()
				.get(MyEntity.class);
		assertEquals("valor1", e.getFirstProperty());
		assertEquals("valor2", e.getSecondProperty());
		assertEquals("valordefault", e.getThirdProperty());
	}
	
	@Test
	public void infoMustReturnJoinedParams(){
		String result = request("info")
				.path("{p1}").resolveTemplate("p1", "valor1")
				.queryParam("q1", "valor2")
				.request()
				.header("h1", "valor3")
				.cookie("c1", "valor4")
				.get(String.class);
		assertEquals("valor1valor2valor3valor4", result);
	}
	
	@Test
	public void validationMustReturnError(){
		MyEntity e = new MyEntity();
		e.setFirstProperty("valor1");
		
		Response r = request("validation")
			.request()
			.post(Entity.entity(e, MediaType.APPLICATION_JSON));
		assertEquals(MyValidationExceptionMapper.UNPROCESSABLE_ENTITY, r.getStatus());
		
		MyExceptionResponse exception = r.readEntity(MyExceptionResponse.class);
		assertEquals("Entidade incompleta", exception.getMessage());
	}
	
	@Test
	public void consumesJsonProducesTextPlainMustReturnJoinedProperties () {
		MyEntity e = new MyEntity();
		e.setFirstProperty("valor1");
		e.setSecondProperty("valor2");
		String result = request("json_textplain")
				.request()
				.post(Entity.entity(e, MediaType.APPLICATION_JSON))
				.readEntity(String.class);
		assertEquals("valor1valor2", result);
	}

}
