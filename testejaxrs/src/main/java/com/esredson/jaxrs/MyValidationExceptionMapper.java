package com.esredson.jaxrs;

import javax.validation.ValidationException;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.ext.ExceptionMapper;
import javax.ws.rs.ext.Provider;

@Provider
public class MyValidationExceptionMapper implements ExceptionMapper<ValidationException>{

	public static int UNPROCESSABLE_ENTITY = 422;
	
	public Response toResponse(ValidationException exception) {
		return Response
				.status(UNPROCESSABLE_ENTITY)
				.type(MediaType.APPLICATION_JSON)
				.entity(new MyExceptionResponse("Entidade incompleta", null))
				.build();
	}

}
