package com.esredson.jaxrs;

import static org.junit.Assert.assertEquals;

import java.security.SecureRandom;

import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.Response;

import org.apache.commons.codec.binary.Base64;
import org.junit.Test;

public class MyProtectedServiceTest extends MyTest{

	public static void main(String args[]) {
		//Generating a secret:
		SecureRandom random = new SecureRandom();
		byte[] values = new byte[20];
		random.nextBytes(values);
		System.out.println(Base64.encodeBase64String(values));
	}
	
	@Override
	protected String getPath() {
		return "protected";
	}
	
	@Test
	public void testeWithoutTokenMustReturnUnauthorized(){
		assertEquals(Response.Status.UNAUTHORIZED.getStatusCode(), 
				request("teste").request().get().getStatus());
	}

	@Test
	public void authenticateWithWrongCredentialsMustReturnUnauthorized(){
		String base64 = Base64.encodeBase64String("testUser:wrongPass".getBytes());
		assertEquals(Response.Status.UNAUTHORIZED.getStatusCode(),
				request("authenticate").request()
				.header(HttpHeaders.AUTHORIZATION, "Basic " + base64)
				.get()
				.getStatus());
	}
	
	@Test
	public void testeWithTokenWithCredentialsMustReturnOk(){
		String base64 = Base64.encodeBase64String("testUser:testPass".getBytes());
		String bearerToken = request("authenticate")
				.request()
				.header(HttpHeaders.AUTHORIZATION, "Basic " + base64)
				.get()
				.getHeaderString(HttpHeaders.AUTHORIZATION);
		assertEquals(Response.Status.OK.getStatusCode(), request("teste")
				.request()
				.header(HttpHeaders.AUTHORIZATION, bearerToken)
				.get()
				.getStatus());
	}

}
