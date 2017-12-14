package com.esredson.jaxrs;

import io.swagger.annotations.Api;

import java.io.ByteArrayOutputStream;

import javax.validation.Valid;
import javax.ws.rs.Consumes;
import javax.ws.rs.DefaultValue;
import javax.ws.rs.GET;
import javax.ws.rs.POST;
import javax.ws.rs.Path;
import javax.ws.rs.PathParam;
import javax.ws.rs.Produces;
import javax.ws.rs.QueryParam;
import javax.ws.rs.core.Context;
import javax.ws.rs.core.HttpHeaders;
import javax.ws.rs.core.MediaType;
import javax.ws.rs.core.Response;
import javax.ws.rs.core.Response.ResponseBuilder;
import javax.ws.rs.core.UriInfo;

import com.lowagie.text.Document;
import com.lowagie.text.DocumentException;
import com.lowagie.text.Paragraph;
import com.lowagie.text.pdf.PdfWriter;

@Api
@Path("/my")
public class MyService {
	
	@GET
	@Path("/textplain")
	@Produces("text/plain")
	public String producesTextPlain(){
		return "Hello!";
	}
	
	@GET
	@Path("/json/{alias}@{domain}.com")
	@Produces(MediaType.APPLICATION_JSON)
	// Se eu informasse mais de um valor no Produces, o escolhido pelo JAX-RS
	// dependeria do header Accept
	public MyEntity producesJson(
			@PathParam("alias") String alias, 
			@PathParam("domain") String domain,
			@DefaultValue("valordefault") @QueryParam("param3") String otherParam){
		MyEntity e = new MyEntity();
		e.setFirstProperty(alias);
		e.setSecondProperty(domain);
		e.setThirdProperty(otherParam);
		return e;
	}
	
	@POST
	@Path("/validation")
	@Consumes(MediaType.APPLICATION_JSON)
	// As regras de validação em MyEntity podiam entrar direto aqui nos parâmetros
	public Response testValidation(@Valid MyEntity e){
		return Response.ok().build();
	}
	
	@POST
	@Path("/json_textplain")
	@Consumes(MediaType.APPLICATION_JSON)
	@Produces(MediaType.TEXT_PLAIN)
	public String consumesJsonProducesTextPlain(MyEntity e){
		return e.getFirstProperty() + e.getSecondProperty();
	}
	
	@GET
	@Path("/pdf")
	@Produces({"application/pdf", MediaType.APPLICATION_JSON})
	public Response producesPdf(@QueryParam("texto") String texto){
		if (texto == null || texto.isEmpty()) 
			return Response
					.status(Response.Status.BAD_REQUEST)
					.type(MediaType.APPLICATION_JSON)
					.entity(new MyExceptionResponse("Texto vazio", null))
					.build();
		try {
			Document doc = new Document();
			ByteArrayOutputStream baos = new ByteArrayOutputStream();
			PdfWriter.getInstance(doc, baos);
			doc.open();
			doc.add(new Paragraph(texto.trim()));
			doc.close();
			byte[] b = baos.toByteArray();
			ResponseBuilder response = Response.ok(b);
			return response.build();
		} catch (DocumentException e) {
			//throw new InternalServerErrorException("Erro");
			return null;
		}
	}
	
	@GET
	@Path("/info/{p1}/")
	@Produces(MediaType.TEXT_PLAIN)
	public String info(@Context UriInfo i, @Context HttpHeaders h){
		return i.getPathParameters().get("p1").get(0) 
				+ i.getQueryParameters().get("q1").get(0)
				+ h.getRequestHeader("h1").get(0)
				+ h.getCookies().get("c1").getValue();
	}
}
